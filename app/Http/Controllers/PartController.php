<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        $parts = response()->json(Part::all());
        return $parts;
    }

    public function show($id)
    {
        $part = response()->json(Part::find($id));
        return $part;
    }

    public function store(Request $request)
    {
        $part = new Part();
        $part->name = $request->name;
        $part->save();
    }

    public function update(Request $request, $id)
    {
        $part = Part::find($id);
        $part->name = $request->name;
        $part->save();
    }

    public function destroy($id)
    {
        Part::find($id)->delete();
    }
}
