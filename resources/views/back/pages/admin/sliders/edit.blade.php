@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">burst_mode</i> Slider slike<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Izmena slider slika</small>
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

                <p class="lead">Izmeni slider sliku</p>
                <form action="{{ url('/admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="position" id="position" type="number" class="form-control" placeholder="Pozicija" required value="{{ $slider->position }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <img class="img-responsive" width="400" src="{{ secure_asset($slider->image) }}" />
                    </div>
                    <div class="form-group">
                        <label for="image"><i>Slika:</i></label>
                        <input type="file" name="image" id="image" required />
                        (max. 2MB)
                        <br/>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="sliderBtn" id="sliderBtn" class="btn btn-dark waves-effect waves-light">Izmeni</button>
                        <a href="#" onclick="history.back(-1)" class="btn waves-effect">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
