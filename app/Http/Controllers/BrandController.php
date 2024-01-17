<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = response()->json(Brand::all());
        return $brands;
    }

    public function show($id)
    {
        $brand = response()->json(Brand::find($id));
        return $brand;
    }

    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->country = $request->country;
        $brand->save();
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->country = $request->country;
        $brand->save();
    }

    public function destroy($id)
    {
        Brand::find($id)->delete();
    }
}
