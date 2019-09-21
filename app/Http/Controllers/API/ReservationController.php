<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ReservationRequest;
use App\Reservation;
use App\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request)
    {
        $reservationCount = Reservation::where('user_id', $request->user_id)
            ->where('date', $request->date)
            ->count();

        if ($reservationCount > 1)
            return response(array($reservationCount), 403);

        Reservation::create([
            'user_id' => $request->user_id,
            'training_id' => $request->training_id,
            'date' => $request->date
        ]);

        $reservations = Reservation::where('training_id', $request->training_id)->where('date', $request->date)->count();
        $my_reservations = Reservation::where('training_id', $request->training_id)->where('date', $request->date)->where('user_id', $request->user_id)->count();

        $isReservable = true;
        if($my_reservations >= 2)
            $isReservable = false;

        return response(array($reservations, $my_reservations, $isReservable), 201);
    }


    public function destroy($id)
    {
        Reservation::find($id)->delete();
        return response('Rezervacija obrisana.', 204);
    }


    public function getCount(ReservationRequest $request)
    {
        $capacity = Training::find($request->training_id)->capacity;
        $reservations = Reservation::where('training_id', $request->training_id)->where('date', $request->date)->count();
        $my_reservations = Reservation::where('training_id', $request->training_id)->where('date', $request->date)->where('user_id', $request->user_id)->count();

        $isReservable = true;
        if($my_reservations >= 2)
            $isReservable = false;

        $isDeletable = false;
        if($my_reservations > 0)
            $isDeletable = true;

        return response()->json(array($capacity, $reservations, $my_reservations, $isReservable, $isDeletable));
    }


    public function dateSearch(Request $request)
    {
        $query = Reservation::where('date', $request->training_date)->get();

        foreach ($query as $entity)
        {
            $entity->user;
            $entity->training;
        }

        return response()->json($query);
    }

    public function deleteUserReservations($id, Request $request)
    {
        Reservation::where('training_id', $request->training_id)->where('date', $request->date)->where('user_id', $id)->delete();

        $reservations = Reservation::where('training_id', $request->training_id)->where('date', $request->date)->count();
        $my_reservations = Reservation::where('training_id', $request->training_id)->where('date', $request->date)->where('user_id', $id)->count();

        return response(array($reservations, $my_reservations), 204);
    }
}
