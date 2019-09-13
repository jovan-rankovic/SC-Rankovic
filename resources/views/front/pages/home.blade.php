@extends('layouts.front')

@section('content')
    @include('front.partials.home.welcome')
    @include('front.partials.home.about')
    @include('front.partials.home.trainings')
    @include('front.partials.home.prices')
    @include('front.partials.home.blog')
    @include('front.partials.home.contact')
    @include('front.partials.home.map')
@endsection

@section('homeNav')
    <li><a href="#welcome" class="smoothScroll">Na vrh</a></li>
@endsection

@section('moreNav')
    @foreach($menus as $menu)
        <li><a href="{{ $menu->route }}" class="smoothScroll">{{ $menu->name }}</a></li>
    @endforeach
@endsection

@section('moreJS')
    <script src="js/jquery.nav.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVHsEpU4NGN1fknIQtadGTDYXKrCNnEfk&amp;callback=initMap" async="" defer=""></script>

    <script>
        $(function(){
            jQuery(document).ready(function() {
                $('#welcome').backstretch([

                    @foreach($sliders as $slider)
                        "{{ $slider->image }}",
                    @endforeach

                ],  {duration: 2000, fade: 750});
            });
        });
    </script>
@endsection
