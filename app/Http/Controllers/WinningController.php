<?php

namespace App\Http\Controllers;

use App\Models\Winning;
use Illuminate\Http\Request;

class WinningController extends Controller
{
    public function index()
    {
        $winnings = response()->json(Winning::all());
        return $winnings;
    }

    public function show($user_id, $brand_id, $part_id)
    {
        $winning = Winning::where('user_id', $user_id)
            ->where('brand_id', $brand_id)
            ->where('part_id', $part_id)
            ->first();
        return $winning;
    }

    public function store(Request $request)
    {
        $winning = new Winning();
        $winning->user_id = $request->user_id;
        $winning->brand_id = $request->brand_id;
        $winning->part_id = $request->part_id;
        $winning->product_id = $request->product_id;
        $winning->date = $request->date;
        $winning->save();
    }

    public function update(Request $request, $user_id, $brand_id, $part_id)
    {
        $winning = $this->show($user_id, $brand_id, $part_id);
        $winning->product_id = $request->product_id;
        $winning->date = $request->date;
        $winning->save();
    }

    public function destroy($user_id, $brand_id, $part_id)
    {
        $this->show($user_id, $brand_id, $part_id)->delete();
    }
}
