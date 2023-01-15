<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Models\Attribute;
use App\Models\Attribute_Value;
use App\Models\Product;
use App\Repositories\AttributeRepository;

use Illuminate\Http\Request;


class attributeController extends AppBaseController
{


    private $attributeRepo;


    private $product;


    public function __construct(AttributeRepository $repository)
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);

        $this->attributeRepo = $repository;
        $this->product = new Product();
    }



    public function create()
    {
        $products = $this->product->all(['product_id', 'product_name']);
        return view($this->attributeRepo->viewPrefix . 'create', compact('products'));
    }


    public function createNew($id)
    {

        $this->attributeRepo->checkId($id);
        $product = $this->product->findOrFail($id, ['product_id', 'product_name']);
        return view($this->attributeRepo->viewPrefix . 'create', compact('product'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|numeric',
            'attr_name' => 'required',
            'value' => 'required',
        ]);
        $attr = $this->attributeRepo->saveAttribute($request);
        return $this->attributeRepo->passViewAfterCreated($attr, 'attributes', 'product.index');

    }



    public function edit(Request $request, $id)
    {
        $this->attributeRepo->checkId($id);
        $attributes = $this->product->findOrFail($id)->attributes;
        if ($request->ajax()) {
            $values = Attribute::findOrFail($request->value)->attributeValues;
            $view = view($this->attributeRepo->viewPrefix . '_data', compact('values'))->render();
            return response()->json(['html' => $view]);
        }
        $values = [];

        return view($this->attributeRepo->viewPrefix . 'edit', compact('attributes', 'values', 'id'));

    }


    public function update(Request $request, $id)
    {

        $this->attributeRepo->checkId($id);
        $this->validate($request, [
            'attr_id' => 'required|numeric',
            'attr_name' => 'required',
            'value' => 'required',
        ]);

        $attr = $this->attributeRepo->updateAttribute($request);

        return $this->attributeRepo->passViewAfterUpdated($attr, 'attributes', 'product.index');

    }

    
    public function destroy($id)
    {
        $attr = $this->attributeRepo->find($id);
        $attr->attributeValues()->delete();
        $attr = $attr->delete();
        return $this->attributeRepo->passViewAfterDeleted($attr, 'attributes');

    }

    
    public function deleteValue($id)
    {
        $this->attributeRepo->checkId($id);
        $value = Attribute_Value::findOrFail($id)->delete();
        return $this->attributeRepo->passViewAfterDeleted($value, 'attributeValues');
    }
}
