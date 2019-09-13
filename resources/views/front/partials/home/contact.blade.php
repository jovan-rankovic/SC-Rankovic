<section id="contact" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="wow fadeInUp col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10" data-wow-delay="0.9s">
                <h2>Kontakt</h2>
                <p>Tu smo za sva vaša pitanja</p>
                <div class="contact_detail">
                    <form action="{{ url('/contact') }}" method="POST" id="contact-signup">
                        @csrf
                        <div class="col-md-6 col-sm-6">
                            <input name="conName" type="text" class="form-control" id="conName" placeholder="Ime" required />
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <input name="conEmail" type="email" class="form-control" id="conEmail" placeholder="E-mail" required />
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <input name="conSubject" type="text" class="form-control" id="conSubject" placeholder="Naslov" required />
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <textarea class="form-control" name="conMsg" id="conMsg" placeholder="Poruka" required ></textarea>
                        </div>
                        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
                            <input name="conBtn" type="submit" class="form-control" id="conBtn" value="POŠALJI">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>