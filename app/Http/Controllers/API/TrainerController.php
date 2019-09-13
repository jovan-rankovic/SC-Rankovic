<?php

namespace App\Http\Controllers\API;

use App\Trainer;
use App\Http\Controllers\Controller;

class TrainerController extends Controller
{
    public function index()
    {
        return response()->json(Trainer::all());
    }
}
