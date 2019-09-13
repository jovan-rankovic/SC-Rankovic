<?php

namespace App\Http\Controllers\API;

use App\Price;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    public function index()
    {
        return response()->json(Price::all());
    }
}
