<?php

namespace App\Http\Controllers\API;

use App\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    public function index()
    {
        return response()->json(Training::all());
    }

    public function getReservable()
    {
        return response()->json(Training::where('reservations', '1')->get());
    }
}
