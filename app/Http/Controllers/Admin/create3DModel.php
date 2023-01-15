<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class create3DModel extends Controller
{
    public function index()
    {
        $productRank = Product::all();
        $productBrand = brand::all();
        return view('admin.products.craete3dModel', compact('productRank', 'productBrand'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd(request());
        $attributes = request()->validate([
            // 'product_name' => '',
            // 'made_in' => null,
            // 'product_slug' => null,
            // 'sale_price' => null,
            // 'buy_price' => null,
            // 'quantity' => null,
            // 'sku' => null,
            // 'weight' => null,
            // 'description' => null,
            // 'cover'=>'required|file|mimes:zip,rar,7z'
        ]);


    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
