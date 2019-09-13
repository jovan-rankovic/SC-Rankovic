@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">link</i> Meni linkovi<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Dodavanje linkova u meniju</small>
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

                <p class="lead">Dodaj link u meniju</p>
                <form action="{{ url('/admin/menus') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="position" id="position" type="number" class="form-control" placeholder="Pozicija" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Ime" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="route" id="route" type="text" class="form-control" placeholder="Putanja" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="menuBtn" id="menuBtn" class="btn btn-dark waves-effect waves-light">Dodaj</button>
                        <a href="#" onclick="history.back(-1)" class="btn waves-effect">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
