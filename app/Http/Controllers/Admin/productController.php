<?php
// namespace App\Models;
namespace App\Http\Controllers\Admin;

use App\Exceptions\SessionExpiredException;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Products\productRequest;
use App\Http\Requests\Products\SecondStepProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use App\Models\ProductRanking;

use App\Repositories\ProductRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

class productController extends AppBaseController
{
    private $productRepo;
    private $product;
    private $category;
    private $paginate;

    public function __construct(ProductRepository $repository)
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);

        $this->productRepo = $repository;
        $this->product = new Product();
        $this->category = new Category();
        $this->paginate = $repository->paginateNum;
    }

    public function index()
    {
        $products = $this->product->with(['categories', 'colors'])->paginate($this->paginate);
        $index_categories = $this->category->all(['category_slug', 'category_name']);
        return view($this->productRepo->viewPrefix . 'index', compact('products', 'index_categories'));
    }

    public function withTrash()
    {
        $products = $this->product
            ->onlyTrashed()
            ->with(['categories', 'colors'])
            ->paginate($this->paginate);
        return view($this->productRepo->viewPrefix . 'index', compact('products'));
    }

    public function sort(Request $request)
    {
        $this->validate($request, [
            'sort' => 'string|required',
            'sort_category' => 'string|nullable',
            'dcs' => 'string|required',
        ]);

        $index_categories = true;
        $query = $this->product;

        if ($request->status) {
            $query = $this->product->where('status', 1);
        }
        if ($cat_slug = $request->sort_category) {
            $products = $query
                ->whereHas('categories', function ($query) use ($cat_slug) {
                    return $query->where('category_slug', $cat_slug);
                })
                ->orderBy("$request->sort", "$request->dcs")
                ->paginate($this->paginate);
        } else {
            $products = $query->orderBy("$request->sort", "$request->dcs")->paginate($this->paginate);
        }
        if ($request->ajax()) {
            $view = view('admin.products._data', compact('products', 'index_categories'))->render();
            return response()->json(['html' => $view]);
        }
        // this var provide to display 'restore' icon

        return view($this->productRepo->viewPrefix . 'index', compact('products', 'index_categories'));
    }

    public function productSorte(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'product_name' => 'required',
            'product_slug' => 'required',
            'sku' => 'required',
            'product_ranking' => 'required',
            'status' => 'required',
            'data_available' => 'required',
            'of_price' => 'required',
            'has_size' => 'required',
            'buy_price' => 'required',
            'sale_price' => 'required',
            'quantity' => 'required',
            'weight' => 'required',
            'made_in' => 'required',
            'description' => 'required',
            '3dmodel' => 'required',
            'cover' => 'required',
        ]);


        $file_name = time() . '.' . request()->cover->getClientOriginalExtension();
        request()->cover->move(public_path('images'), $file_name);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->brand_id = $request->brand_id;
        $product->product_slug = $request->product_slug;
        $product->sku = $request->sku;
        $product->product_ranking = $request->product_ranking;
        $product->status = $request->status;
        $product->data_available = $request->data_available;
        $product->of_price = $request->of_price;
        $product->has_size = $request->has_size;
        $product->buy_price = $request->buy_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;
        $product->weight = $request->weight;
        $product->description = $request->description;
        $product->model3d = $request->model3d;
        $product->made_in = $request->made_in;
        $product->cover = $file_name;
        dd($product->cover);
        $product->save();
        // return $this->index();
        return redirect('admin.product.create3')->with('success', 'Product Data Add successfully');


    }

    public function create3()
    {
        $brands = brand::all(['brand_id', 'brand_name']);
        $product_ranking = DB::table('product_rankings')->get();
        $colors = Color::all(['color_id', 'color_name']);
        $categories = $this->category->all(['category_id', 'category_name']);
        return view($this->productRepo->viewPrefix . 'create3', compact('brands', 'product_ranking', 'colors', 'categories'));
    }

    public function restore(int $id)
    {
        $product = $this->productRepo->findWithTrash($id)->restore();
        return $this->productRepo->passResponse($product, 'products', 'restored');
    }

    public function create()
    {
        // $categories = $this->category->all(['category_id', 'category_name']);
        $brands = brand::all(['brand_id', 'brand_name']);
        $product_ranking = DB::table('product_rankings')->get();
        return view($this->productRepo->viewPrefix . 'create', compact('brands', 'product_ranking'));
    }

    public function createSecondStep()
    {
        $colors = Color::all(['color_id', 'color_name']);
        $categories = $this->category->all(['category_id', 'category_name']);
        return view($this->productRepo->viewPrefix . 'create2', compact('colors', 'categories'));
    }

    public function productTags(string $tag)
    {
        $tags = Tag::where('tag_slug', 'like', '%' . $tag . '%')
            ->pluck('tag_name')
            ->toArray();
        return response()->json($tags);
    }

    public function store(productRequest $request)
    {
        // $request->validate([
        //     'brand_id'        =>'required',
        //     'product_name'    =>'required',
        //     'product_slug'    =>'required',
        //     'sku'             =>'required',
        //     'product_ranking' =>'required',
        //     'status'          =>'required',
        //     'data_available'  =>'required',
        //     'of_price'        =>'required',
        //     'has_size'        =>'required',
        //     'buy_price'       =>'required',
        //     'sale_price'      =>'required',
        //     'quantity'        =>'required',
        //     'weight'          =>'required',
        //     'made_in'          =>'required',
        //     'description'     =>'required',
        //     'cover'     =>'required',
        // ]);


        $file_name = time() . '.' . request()->cover->getClientOriginalExtension();
        request()->cover->move(public_path('images'), $file_name);

        $file_name1 = time() . '.' . request()->image1->getClientOriginalExtension();
        request()->image1->move(public_path('images'), $file_name1);

        $file_name2 = time() . '.' . request()->image2->getClientOriginalExtension();
        request()->image2->move(public_path('images'), $file_name2);

        $product = new Product ;
        // dd($product->orderBy('product_id', 'DESC')->first());
        $product->product_name = $request->product_name;
        $product->brand_id = $request->brand_id;
        $product->product_slug = $request->product_slug;
        $product->sku = $request->sku;
        $product->data_available = $request->data_available;
        $product->off_price = $request->off_price;
        $product->buy_price = $request->buy_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;
        $product->weight = $request->weight;
        $product->description = $request->description;
        $product->model3d = $request->model3d;
        $product->made_in = $request->made_in;
        $product->cover = $file_name;
        $product->image1 = $file_name1;
        $product->image2 = $file_name2;
        $product->save();
        // return $this->index();
        return Redirect::back()->with('success', 'Operation Successful !');
    }

    public function storeSecondStep(SecondStepProductRequest $request)
    {
        if (!session()->has('create-product')) {
            if ($request->ajax()) {
                return $this->sendError('your session expired', 440);
            }
            throw new SessionExpiredException();
        }
        $product = $this->productRepo->createProductSecondStep($request);
        if ($product) {
            session()->forget('create-product');
        }
        return $this->productRepo->passViewAfterCreated($product, 'products', 'product.index');
    }

    public function show($id)
    {
        $product = $this->productRepo->find($id)->load('comments');
        $comments = $product->comments()->paginate(4);
        $colors = $product->colors(['color_name', 'color_code'])->get();
        $averageRating = $product->averageRating;
        $product_ranking = ProductRanking::all(['products_ranking']);
        $categories = $product->categories(['category_name'])->get();
        return view($this->productRepo->viewPrefix . 'show', compact('product', 'comments', 'colors', 'averageRating', 'categories', 'products_ranking'));
    }

    public function edit($id)
    {
        $product = $this->productRepo->find($id);
        $colors = Color::all(['color_id', 'color_name']);
        $p_colors = $product->colors->pluck('color_id')->toArray();
        $categories = $this->category->all(['category_id', 'category_name']);
        $product_ranking = ProductRanking::all();
        // $product_ranking = ProductRanking::all(['products_ranking , id']);
        $p_categories = $product->categories->pluck('category_id')->toArray();
        $brands = brand::all(['brand_id', 'brand_name']);

        return view('admin.products.edit', compact('product', 'colors', 'categories', 'brands', 'p_categories', 'p_colors', 'product_ranking'));
    }

    public function update(Request $request, $id)
    {


        if ($request->image != '') {
            $file_name = time() . '.1' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $file_name);
        } else {
            $file_name = $request->hidden_image;
        }


        $cover = time() . '.' . request()->cover->getClientOriginalExtension();
        request()->cover->move(public_path('images'), $cover);

        $image1 = time() . '.' . request()->image1->getClientOriginalExtension();
        request()->image1->move(public_path('images'), $image1);

        $image2 = time() . '.' . request()->image2->getClientOriginalExtension();
        request()->image2->move(public_path('images'), $image2);
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->brand_id = $request->brand_id;
        $product->product_slug = $request->product_slug;
        $product->sku = $request->sku;
        $product->product_ranking = $request->product_ranking;
        // $product->status =1;
        $product->data_available = $request->data_available;
        $product->off_price = $request->off_price;
        // $product->has_size = 1;
        $product->buy_price = $request->buy_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;
        $product->weight = $request->weight;
        $product->description = $request->description;
        $product->model3d = $request->model3d;
        $product->made_in = $request->made_in;
        $product->cover = $cover;
        $product->image1 = $image1;
        $product->image2 = $image2;
        // dd($product->cover);

        $product->save();

        // return $this->index();
        return Redirect::back()->with('message', 'Operation Successful !');

        // $product = $this->productRepo->updateProduct($request, $id);

        // return $this->productRepo->passViewAfterUpdated($product, 'products', 'product.index');
    }

    public function destroy($id)
    {
        $product = $this->productRepo->destroy($id);
        return back()->withMessage('product form deleted');
    }

}
