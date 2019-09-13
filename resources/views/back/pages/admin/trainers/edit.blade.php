@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">sports</i> Cene<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Izmena trenera</small>
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

                <p class="lead">Izmeni trenera</p>
                <form action="{{ url('/admin/trainers/'.$trainer->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="first_name" id="first_name" type="text" class="form-control" placeholder="Ime" required value="{{ $trainer->first_name }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Prezime" required value="{{ $trainer->last_name }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="trainerBtn" id="trainerBtn" class="btn btn-dark waves-effect waves-light">Izmeni</button>
                        <a href="#" onclick="history.back(-1)" class="btn waves-effect">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
