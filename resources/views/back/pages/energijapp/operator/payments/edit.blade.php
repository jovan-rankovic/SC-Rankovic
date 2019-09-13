@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">attach_money</i> Uplate<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Izmena uplata</small>
        </h2>
    </div>
@endsection

@section('content')
    <payment-edit payment_id="{!! $id !!}" user_id="{!! $user_id !!}"></payment-edit>
@endsection
