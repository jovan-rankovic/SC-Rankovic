@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">person</i> Korisnici<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Izmena korisnika</small>
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

                <p class="lead">Edit a user</p>
                <form action="{{ url('/admin/users/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="first_name" id="first_name" type="text" class="form-control" placeholder="Ime" value="{{ $user->first_name }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Prezime" value="{{ $user->last_name }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="email" id="email" type="email" class="form-control" placeholder="E-mail" value="{{ $user->email }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="phone" id="phone" type="tel" class="form-control" placeholder="Telefon" value="{{ $user->phone }}" required />
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="birth_date"><p><i>Datum rođenja:</i></p></label>
                        <div class="form-line">
                            <input name="birth_date" id="birth_date" type="date" class="form-control" value="{{ $user->birth_date }}" required />
                        </div>
                    </div>
                    @if(session('user')->role->name == 'admin')
                        <div class="form-group">
                            <p><b><i>Uloga:</i></b></p>
                            @foreach($roles as $role)
                                <input id="role{{ $role->id }}" name="role_id" type="radio" value="{{ $role->id }}" @if($user->role->id == $role->id) checked @endif />
                                <label for="role{{ $role->id }}"> {{ ucfirst($role->name) }} </label>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <img class="img-responsive img-circle" width="65" height="65" src="{{ secure_asset($user->image) }}" />
                    </div>
                    <div class="form-group">
                        <label for="image"><p><i>Slika:</i></p></label>
                        <input type="file" name="image" id="image" />
                        (max. 2MB, 1:1 razmera)
                        <br/>
                    </div>
                    <br/>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="card_number" id="card_number" type="text" class="form-control" placeholder="Broj kartice" value="{{ $user->card_number }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="address" id="address" type="text" class="form-control" placeholder="Adresa" value="{{ $user->address }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="userBtn" id="userBtn" class="btn btn-dark waves-effect waves-light">Izmeni</button>
                        <a href="#" onclick="history.back(-1)" class="btn waves-effect">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>

@endsection
