@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">euro_symbol</i> Cene<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Izmena cena</small>
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

                <p class="lead">Izmeni cenu</p>
                <form action="{{ url('/admin/prices/'.$price->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="title" id="title" type="text" class="form-control" placeholder="Naziv paketa" required value="{{ $price->title }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="sessions" id="sessions" type="number" class="form-control" placeholder="Broj termina" required value="{{ $price->sessions }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="amount" id="amount" type="number" class="form-control" placeholder="Iznos" required value="{{ $price->amount }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="priceBtn" id="priceBtn" class="btn btn-dark waves-effect waves-light">Izmeni</button>
                        <a href="#" onclick="history.back(-1)" class="btn waves-effect">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
