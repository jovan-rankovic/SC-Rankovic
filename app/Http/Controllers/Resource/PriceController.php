<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\PriceRequest;
use App\Price;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::orderBy('amount')->paginate(6);
        return view('back.pages.admin.prices.index', compact('prices'));
    }


    public function create()
    {
        return view('back.pages.admin.prices.create');
    }


    public function store(PriceRequest $request)
    {
        Price::create([
           'title' => $request->title,
           'sessions' => $request->sessions,
           'amount' => $request->amount
        ]);

        return redirect('/admin/prices');
    }


    public function show(Price $price)
    {
        //
    }


    public function edit(Price $price)
    {
        return view('back.pages.admin.prices.edit', compact('price'));
    }


    public function update(PriceRequest $request, Price $price)
    {
        $price->update([
            'title' => $request->title,
            'sessions' => $request->sessions,
            'amount' => $request->amount
        ]);

        return redirect('/admin/prices');
    }


    public function destroy()
    {
        Price::where(request(['id']))->delete();
    }
}
