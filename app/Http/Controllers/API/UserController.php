<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\PasswordRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function cardNumberSearch(Request $request)
    {
        $query = User::where('card_number', $request->card_number)->get();

        return response()->json($query);
    }


    public function nameSearch(Request $request)
    {
        $fn_operator = 'like';
        if($request->first_name == null)
            $fn_operator = '<>';

        $ln_operator = 'like';
        if($request->last_name == null)
            $ln_operator = '<>';

        $date_operator = '<>';
        $date_value = null;
        if($request->active == 'true')
        {
            $date_operator = '>';
            $date_value = Carbon::now()->toDateString();
        }

        $pagination = User::whereHas('payment', function (Builder $query1) use ($date_value, $date_operator) {
            $query1->where('valid_thru', $date_operator, $date_value);
        })->where('first_name', $fn_operator, '%'.$request->first_name.'%')
        ->where('last_name', $ln_operator, '%'.$request->last_name.'%')
        ->orderBy('card_number')->paginate(5);

        return response()->json($pagination);
    }


    public function getOperators()
    {
        return response()->json(User::where('role_id', 1)->orWhere('role_id', 3)->get());
    }


    public function getPrivilege()
    {
        if (session('user')->role->name == 'admin' || session('user')->role->name == 'operator')
            return response('Privilegovan.', '200');

        return response('Nije privilegovan.', 401);
    }


    public function changePassword($id, PasswordRequest $request)
    {
        if($request->newPassword != null || $request->newPasswordConfirm)
        {
            if ($request->newPassword == $request->newPasswordConfirm)
            {
                $password = md5($request->newPassword);
                User::find($id)->update(['password' => $password]);
                return response('Lozinka promenjena.', 204);
            }
        }
        return response('Greška.', 422);
    }
}
