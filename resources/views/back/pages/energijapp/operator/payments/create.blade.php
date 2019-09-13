@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">attach_money</i> Uplate<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Dodavanje uplata</small>
        </h2>
    </div>
@endsection

@section('content')
    <payment-create user_id="{!! $id !!}" operator_id="{!! session('user')->id !!}"></payment-create>
@endsection
