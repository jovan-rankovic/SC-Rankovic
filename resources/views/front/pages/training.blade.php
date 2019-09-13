@extends('layouts.front')

@section('content')
    @include('front.partials.training.header')

    <section id="blog" class="parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">

                    @include('front.partials.training.content')

                </div>
            </div>
        </div>
    </section>
@endsection

@section('homeNav')
    <li><a href="{{ url('/') }}">Početna</a></li>
@endsection

@section('moreCSS')
    <style>
        #blog-header {
            background: url('{{ secure_asset($training->image) }}') 50% 0 repeat-y fixed;
        }
    </style>
@endsection