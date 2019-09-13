<div class="container">
    <div class="row">

        <div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.5s">
            <h2>Treninzi</h2>
            <p>Prelaskom preko slika saznajte više o našim treninzima</p>
        </div>

        @foreach($trainings as $training)

            <div class="wow fadeInUp col-md-4 col-sm-6" data-wow-delay="0.5s">
                <div class="trainer-thumb">
                    <img src="{{ secure_asset($training->logo) }}" class="img-responsive" alt="Trening">
                    <div class="trainer-overlay">
                        <div class="trainer-des">
                            <h2>{{ $training->intensity }} intenzitet</h2>
                            <h3>{{ $training->duration }} min.

                            @if($training->reservations == true)
                                <h5>Rezervacije su obavezne</h5>
                            @else
                                <h5>Bez rezervacija</h5>
                            @endif

                            <ul class="social-icon">
                                <li><a href="{{ url('/trainings').'/'.$training->id }}" class="fa fa-info wow fadeInUp" data-wow-delay="1s"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

    <div id="training_pagination" class="wow fadeInUp text-center" data-wow-delay="1.2s">{{ $trainings->links() }}</div>

</div>

 <div id="sessions">
     <a href="{{ url('/sessions') }}" class="wow fadeInUp btn btn-default" data-wow-delay="1.5s">RASPORED</a>
 </div>
