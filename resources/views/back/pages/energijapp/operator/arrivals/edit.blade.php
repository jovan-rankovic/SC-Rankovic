@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">arrow_downward</i> Dolasci<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Izmena dolazaka</small>
        </h2>
    </div>
@endsection

@section('content')
    <arrival-edit arrival_id="{!! $id !!}" user_id="{!! $user_id !!}"></arrival-edit>
@endsection
