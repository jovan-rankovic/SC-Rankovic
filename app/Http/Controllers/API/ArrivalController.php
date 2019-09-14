<?php

namespace App\Http\Controllers\API;

use App\Arrival;
use App\Http\Requests\ArrivalRequest;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArrivalController extends Controller
{
    public function index(Request $request)
    {
        $date_from = '2013-05-15';
        if($request->date_from)
            $date_from = $request->date_from;

        $date_to = '2100-01-01';
        if($request->date_to)
            $date_to = $request->date_to;

        $training_operator = '=';
        if($request->training_id == null)
            $training_operator = '<>';

        $trainer_operator = '=';
        if($request->trainer_id == null)
            $trainer_operator = '<>';

        $pagination = Arrival::whereBetween('date', [$date_from, $date_to])
            ->where('training_id', $training_operator, $request->training_id)
            ->where('trainer_id', $trainer_operator, $request->trainer_id)
            ->paginate(10);

        foreach ($pagination as $entity)
        {
            $entity->user;
            $entity->training;
            $entity->trainer;
        }

        return response()->json($pagination);
    }


    public function store(ArrivalRequest $request)
    {
        $payment = Payment::find($request->payment_id);
        $arrivals = Arrival::where('user_id', $request->user_id)->where('payment_id', $request->payment_id)->get();
        $arrivalCount = $arrivals->count();

        if($arrivalCount < $payment->price->sessions)
        {
            Arrival::create([
                'date' => $request->date,
                'training_id' => $request->training_id,
                'trainer_id' => $request->trainer_id,
                'payment_id' => $request->payment_id,
                'user_id' => $request->user_id
            ]);

            return response('Dolazak dodat.', 201);
        }

        return response('Termini su iskorišćeni.', 422);
    }


    public function show($id)
    {
        return response()->json(Arrival::find($id));
    }


    public function update(ArrivalRequest $request, $id)
    {
        Arrival::find($id)->update([
            'date' => $request->date,
            'training_id' => $request->training_id,
            'trainer_id' => $request->trainer_id
        ]);

        return response('Dolazak izmenjen.', 204);
    }


    public function destroy($id)
    {
        Arrival::find($id)->delete();
        return response('Dolazak obrisan.', 204);
    }

    public function getUserArrivals($id)
    {
        $arrivalData = Arrival::select('date', DB::raw('count(id) as count'))
            ->groupBy('date')
            ->where('user_id', $id)
        ->get();

        return response()->json($arrivalData);
    }
}
