<section id="welcome" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-offset-1 col-md-10 col-sm-12">

                @isset($errors)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning">
                            {{ $error }}
                        </div>
                    @endforeach
                @endisset

                @if(session('message'))
                    <h3 class="wow bounceIn" data-wow-delay="0.9s">{{ session('message') }}</h3>
                @endif

                <h1 class="wow fadeInUp" data-wow-delay="1.6s">SC Ranković</h1>
                <a href="#about" id="arrowdown" class="wow fadeInUp smoothScroll arrow" data-wow-delay="2s"><span></span></a>
            </div>

        </div>
    </div>
</section>