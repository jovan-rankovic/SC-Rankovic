@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">group_work</i> Usluge<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Dodavanje usluga</small>
        </h2>
    </div>
@endsection

@section('content')

    <div class="body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                @isset($errors)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning">
                            {{ $error }}
                        </div>
                    @endforeach
                @endisset

                <p class="lead">Dodaj uslugu</p>
                <form action="{{ url('/admin/services') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Naziv" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="price_id" id="price_id">
                            <option value="0">Izaberi cenovnu kategoriju...</option>

                            @foreach($prices as $price)
                                <option value="{{ $price->id }}">${{ $price->amount }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="serviceBtn" id="serviceBtn" class="btn btn-dark waves-effect waves-light">Dodaj</button>
                        <a href="#" onclick="history.back(-1)" class="btn waves-effect">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
