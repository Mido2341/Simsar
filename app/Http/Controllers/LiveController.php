<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function live(Land $land)
    {
        auth()->user()->lives()->toggle($land);
        return back();
    }
}
