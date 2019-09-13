<footer>
    <div class="container">
        <div class="row">

            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.6s">
                <br/>

                <h4>
                    Bulevar kralja Aleksandra 443a
                </h4>

                <h4>
                    065/37-37-655
                </h4>

                <h4>
                    scrankovic@hotmail.com
                </h4>

            </div>

            <div class="wow fadeInUp col-md-5 col-sm-4"  data-wow-delay="0.9s">
                <img src="{{ asset('images/logo/scr.png') }}" height="150" width="150">
            </div>

            <div class="wow fadeInUp col-md-3 col-sm-4" data-wow-delay="1s">
                <h2>Pratite nas</h2>
                <ul class="social-icon">

                    @foreach($socials as $social)
                        <li><a href="{{ $social->url }}" class="fa fa-{{ $social->icon }} wow fadeInUp" data-wow-delay="1s"></a></li>
                    @endforeach

                </ul>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12">
                <p class="copyright-text">&copy; 2019 <a href="#" data-toggle="modal" data-target="#author-modal">Jovan Ranković</a></p>
            </div>

            <!-- Author modal -->
            <div id="author-modal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Autor</h4>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('images/user/author.jpg') }}" class="img-responsive img-circle center-block" width="200" height="200"><br/>
                            <p class="text-center"><a href="https://www.linkedin.com/in/jovan-rankovic/"><strong>LinkedIn</strong></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Author modal END -->

        </div>
    </div>
</footer>
