<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;

class LovesRentController extends Controller
{
    public function love(Rent $rent)
    {
        auth()->user()->loves()->toggle($rent);
        return back();
    }
 }
