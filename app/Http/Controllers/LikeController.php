<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\Like;
use App\Models\Rent;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Sale $sale)
    {
        auth()->user()->likes()->toggle($sale);
        return back();
    }

    public function favorite(Sale $sales,Rent $rents,Land $lands)
    {
        $sales=sale::get();
        $rents=Rent::get();
        $lands= Land::get();
        return view('Favorite',compact(['sales','rents','lands']));
    }

    // public function love(Rent $rent)
    // {
    //     auth()->user()->loves()->toggle($rent);
    //     return back();
    // }
}
