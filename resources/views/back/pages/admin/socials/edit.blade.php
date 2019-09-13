@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">share</i> Socijalne mreže<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Izmena socijalnih mreža</small>
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

                <p class="lead">Izmeni socijalnu mrežu</p>
                <form action="{{ url('/admin/socials/'.$social->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Naziv" required value="{{ $social->name }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="url" id="url" type="url" class="form-control" placeholder="URL" required value="{{ $social->url }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="icon" id="icon" type="text" class="form-control" placeholder="Font Awesome ikonica" required value="{{ $social->icon }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="socialBtn" id="socialBtn" class="btn btn-dark waves-effect waves-light">Izmeni</button>
                        <a href="#" onclick="history.back(-1)" class="btn waves-effect">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
