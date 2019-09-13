<section id="prices" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.9s">
                <h2>Cene</h2>
                <p>Nudimo najpovoljnije usluge u našem kraju</p>
            </div>

            @foreach($prices as $price)

                <div class="wow fadeInUp col-md-4 col-sm-6" data-wow-delay="1s">
                    <div class="pricing__item">
                        <h3 class="pricing__title">{{ $price->title }}</h3>
                        <div class="pricing__price">{{ $price->amount }} <span class="pricing__currency">din.</span></div>
                        <ul class="pricing__feature-list">

                            @foreach($price->services as $pService)

                                <li class="pricing__feature">{{ $pService->name }}</li>

                            @endforeach

                        </ul>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</section>