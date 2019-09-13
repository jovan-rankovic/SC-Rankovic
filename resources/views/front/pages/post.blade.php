@extends('layouts.front')

@section('content')
    @include('front.partials.post.header')

    <section id="blog" class="parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">

                    @include('front.partials.post.content')
                    @include('front.partials.post.comments')
                    @include('front.partials.post.form')

                </div>
            </div>
        </div>
    </section>
@endsection

@section('homeNav')
    <li><a href="{{ url('/') }}">Početna</a></li>
@endsection

@section('moreNav')
    <li><a href="#comments" class="smoothScroll">Komentari</a></li>
@endsection

@section('moreCSS')
    <style>
        #blog-header {
            background: url('{{ secure_asset($post->image) }}') 50% 0 repeat-y fixed;
        }
    </style>
@endsection

@section('moreJS')
    <script>
        const TOKEN = "{{ csrf_token() }}";
    </script>
@endsection