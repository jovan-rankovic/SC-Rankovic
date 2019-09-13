<?php

namespace App\Http\Controllers\Resource;

use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        return view('back.pages.admin.payments.index');
    }


    public function create($id)
    {
        return view('back.pages.energijapp.operator.payments.create', compact('id'));
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
        $user_id = Payment::find($id)->user->id;
        return view('back.pages.energijapp.operator.payments.edit', compact('id', 'user_id'));
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
