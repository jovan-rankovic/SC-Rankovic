<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\PaymentRequest;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $date_from = '2013-05-15';
        if($request->date_from)
            $date_from = $request->date_from;

        $date_to = '2100-01-01';
        if($request->date_to)
            $date_to = $request->date_to;

        $price_operator = '=';
        if($request->price_id == null)
            $price_operator = '<>';

        $operator_operator = '=';
        if($request->operator_id == null)
            $operator_operator = '<>';

        $pagination = Payment::whereBetween('payment_date', [$date_from, $date_to])
            ->where('price_id', $price_operator, $request->price_id)
            ->where('operator_id', $operator_operator, $request->operator_id)
            ->paginate(10);

        foreach ($pagination as $entity)
        {
            $entity->price;
            $entity->user;
            $entity->operator;
        }

        $query = Payment::whereBetween('payment_date', [$date_from, $date_to])
            ->where('price_id', $price_operator, $request->price_id)
            ->where('operator_id', $operator_operator, $request->operator_id)
            ->get();

        $sum = 0;
        foreach ($query as $entity)
            $sum += $entity->price->amount;

        return response()->json(array($pagination, $sum));
    }


    public function store(PaymentRequest $request)
    {
        Payment::create([
            'price_id' => $request->price_id,
            'payment_date' => $request->payment_date,
            'valid_thru' => $request->valid_thru,
            'user_id' => $request->user_id,
            'operator_id' => $request->operator_id
        ]);

        return response('Uplata izvršena.', 201);
    }


    public function show($id)
    {
        return response()->json(Payment::find($id));
    }


    public function update(PaymentRequest $request, $id)
    {
        Payment::find($id)->update([
            'price_id' => $request->price_id,
            'payment_date' => $request->payment_date,
            'valid_thru' => $request->valid_thru
        ]);

        return response('Uplata izmenjena.', 204);
    }


    public function destroy($id)
    {
        Payment::find($id)->delete();
        return response('Uplata obrisana.', 204);
    }


    public function getUserPayments($id)
    {
        $pagination = Payment::where('user_id', $id)->paginate(10);

        foreach ($pagination as $entity)
            $entity->price;

        $query = Payment::where('user_id', $id)->get();
        $sum = 0;

        foreach ($query as $entity)
            $sum += $entity->price->amount;

        return response()->json(array($pagination, $sum));
    }


    public function getUserPaymentArrivals($id)
    {
        $pagination = Payment::where('user_id', $id)->paginate(7);

        foreach ($pagination as $entity)
        {
            $entity->price;
            $arrivals = $entity->arrivals;

            foreach ($arrivals as $arrival)
            {
                $arrival->training;
                $arrival->trainer;
            }
        }

        return response()->json($pagination);
    }
}
