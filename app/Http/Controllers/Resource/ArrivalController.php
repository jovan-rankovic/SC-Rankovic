<?php

namespace App\Http\Controllers\Resource;

use App\Arrival;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArrivalController extends Controller
{
    public function index()
    {
        return view('back.pages.admin.arrivals.index');
    }


    public function create($id)
    {
        $user_id = Payment::find($id)->user->id;
        return view('back.pages.energijapp.operator.arrivals.create', compact('id', 'user_id'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user_id = Arrival::find($id)->user->id;
        return view('back.pages.energijapp.operator.arrivals.edit', compact('id', 'user_id'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
