@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">fitness_center</i> Treninzi<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Izmena treninga</small>
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

                <p class="lead">Izmeni trening</p>
                <form action="{{ url('/admin/trainings/'.$training->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Naziv" required value="{{ $training->name }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="duration" id="duration" type="number" class="form-control" placeholder="Trajanje (u minutima)" required value="{{ $training->duration }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="capacity" id="capacity" type="number" class="form-control" placeholder="Kapacitet" required value="{{ $training->capacity }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="intensity" id="intensity" type="text" class="form-control" placeholder="Intenzitet" required value="{{ $training->intensity }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="target" id="target" type="text" class="form-control" placeholder="Ciljna grupa" required value="{{ $training->target }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea name="benefits" id="benefits" class="form-control" placeholder="Pogodnosti" rows="7" required >{{ $training->benefits }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea name="description" id="description" class="form-control" placeholder="Opis" rows="7" required >{{ $training->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <img class="img-responsive" width="180" src="{{ secure_asset($training->logo) }}" />
                    </div>
                    <div class="form-group">
                        <label for="logo"><p><i>Logo:</i></p></label>
                        <input type="file" name="logo" id="logo" />
                        (max. 2MB, 360x450)
                        <br/>
                    </div>
                    <div class="form-group">
                        <img class="img-responsive" width="180" src="{{ secure_asset($training->image) }}" />
                    </div>
                    <div class="form-group">
                        <label for="image"><p><i>Slika:</i></p></label>
                        <input type="file" name="image" id="image" />
                        (max. 2MB)
                        <br/>
                    </div>
                    <div class="form-group">
                        <p><b><i>Rezervacije:</i></b></p>
                        <input id="reservation-1" name="reservations" type="radio" value=1 @if($training->reservations == true) checked @endif>
                        <label for="reservation-1"> Da </label>
                        <input id="reservation-0" name="reservations" type="radio" value=0 @if($training->reservations == false) checked @endif>
                        <label for="reservation-0"> Ne </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="trainingBtn" id="trainingBtn" class="btn btn-dark waves-effect waves-light">Izmeni</button>
                        <a href="#" onclick="history.back(-1)" class="btn waves-effect">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
