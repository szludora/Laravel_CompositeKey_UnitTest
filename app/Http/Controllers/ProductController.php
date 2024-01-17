<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = response()->json(Product::all());
        return $products;
    }

    public function show($id)
    {
        $product = response()->json(Product::find($id));
        return $product;
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->part_id = $request->part_id;
        $product->brand_id = $request->brand_id;
        $product->save();
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->part_id = $request->part_id;
        $product->brand_id = $request->brand_id;
        $product->save();
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }
}
