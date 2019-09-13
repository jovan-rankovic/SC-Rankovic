<div class="body">
    <div class="row clearfix">

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/users') }}">
                <div class="info-box bg-deep-purple hover-zoom-effect waves-effect">
                    <div class="icon">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="content">
                        @if($users->count() > 1)
                            <div class="text">{{ $users->count() }} KORISNIKA</div>
                        @elseif($users->count == 1)
                            <div class="text">1 KORISNIK</div>
                        @else
                            <div class="text">NEMA KORISNIKA</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/posts') }}">
                <div class="info-box bg-deep-purple hover-zoom-effect waves-effect">
                    <div class="icon">
                        <i class="material-icons">border_color</i>
                    </div>
                    <div class="content">
                        @if($posts->count() > 4)
                            <div class="text">{{ $posts->count() }} POSTOVA</div>
                        @elseif($posts->count() == 2 || $posts->count() == 3 || $posts->count() == 4)
                            <div class="text">{{ $posts->count() }} POSTA</div>
                        @elseif($posts->count() == 1)
                            <div class="text">1 POST</div>
                        @else
                            <div class="text">NEMA POSTOVA</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/sliders') }}">
                <div class="info-box bg-deep-purple hover-zoom-effect waves-effect">
                    <div class="icon">
                        <i class="material-icons">burst_mode</i>
                    </div>
                    <div class="content">
                        @if($sliders->count() == 1 || $sliders->count() > 4)
                            <div class="text">{{ $sliders->count() }} SLIDER SLIKA</div>
                        @elseif($sliders->count() == 2 || $sliders->count() == 3 || $sliders->count() == 4)
                            <div class="text">{{ $sliders->count() }} SLIDER SLIKE</div>
                        @else
                            <div class="text">NEMA SLIDER SLIKA</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/menus') }}">
                <div class="info-box bg-deep-purple hover-zoom-effect waves-effect">
                    <div class="icon">
                        <i class="material-icons">link</i>
                    </div>
                    <div class="content">
                        @if($menus->count() > 4)
                            <div class="text">{{ $menus->count() }} MENI LINKOVA</div>
                        @elseif($menus->count() == 2 || $menus->count() == 3 || $menus->count() == 4)
                            <div class="text">{{ $menus->count() }} MENI LINKA</div>
                        @elseif($menus->count() == 1)
                            <div class="text">1 MENI LINK</div>
                        @else
                            <div class="text">NEMA MENI LINKOVA</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/trainers') }}">
                <div class="info-box bg-deep-purple hover-zoom-effect waves-effect">
                    <div class="icon">
                        <i class="material-icons">sports</i>
                    </div>
                    <div class="content">
                        @if($trainers->count() > 1)
                            <div class="text">{{ $trainers->count() }} TRENERA</div>
                        @elseif($trainers->count() == 1)
                            <div class="text">1 TRENER</div>
                        @else
                            <div class="text">NEMA TRENERA</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/trainings') }}">
                <div class="info-box bg-deep-purple hover-zoom-effect waves-effect">
                    <div class="icon">
                        <i class="material-icons">fitness_center</i>
                    </div>
                    <div class="content">
                        @if($trainings->count() > 1)
                            <div class="text">{{ $trainings->count() }} TRENINGA</div>
                        @elseif($trainings->count() == 1)
                            <div class="text">1 TRENING</div>
                        @else
                            <div class="text">NEMA TRENINGA</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/prices') }}">
                <div class="info-box bg-deep-purple hover-zoom-effect waves-effect">
                    <div class="icon">
                        <i class="material-icons">euro_symbol</i>
                    </div>
                    <div class="content">
                        @if($prices->count() == 1 || $prices->count() > 4)
                            <div class="text">{{ $prices->count() }} CENA</div>
                        @elseif($prices->count() == 2 || $prices->count() == 3 || $prices->count() == 4)
                            <div class="text">{{ $prices->count() }} CENE</div>
                        @else
                            <div class="text">NEMA CENA</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/services') }}">
                <div class="info-box bg-deep-purple hover-zoom-effect waves-effect">
                    <div class="icon">
                        <i class="material-icons">group_work</i>
                    </div>
                    <div class="content">
                        @if($services->count() == 1 || $services->count() > 4)
                            <div class="text">{{ $services->count() }} USLUGA</div>
                        @elseif($services->count() == 2 || $services->count() == 3 || $services->count() == 4)
                            <div class="text">{{ $services->count() }} USLUGE</div>
                        @else
                            <div class="text">NEMA USLUGA</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/socials') }}">
                <div class="info-box bg-deep-purple hover-zoom-effect waves-effect">
                    <div class="icon">
                        <i class="material-icons">share</i>
                    </div>
                    <div class="content">
                        @if($socials->count() > 4)
                            <div class="text">{{ $socials->count() }} SOCIJALNIH MREŽA</div>
                        @elseif($socials->count() == 2 || $socials->count() == 3 || $socials->count() == 4)
                            <div class="text">{{ $socials->count() }} SOCIJALNE MREŽE</div>
                        @elseif($socials->count() == 1)
                            <div class="text">1 SOCIJALNA MREŽA</div>
                        @else
                            <div class="text">NEMA SOCIJALNIH MREŽA</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/arrivals') }}">
                <div class="info-box bg-deep-orange hover-zoom-effect waves-effect">
                    <div class="icon">
                        <i class="material-icons">arrow_downward</i>
                    </div>
                    <div class="content">
                        <div class="text">DOLASCI</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/payments') }}">
                <div class="info-box bg-deep-orange hover-zoom-effect waves-effect">
                    <div class="icon">
                        <i class="material-icons">show_chart</i>
                    </div>
                    <div class="content">
                        <div class="text">UPLATE</div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
