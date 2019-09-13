<div class="navbar navbar-default navbar-fixed-top sticky-navigation" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand">SC RANKOVIĆ</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right main-navigation">
                @yield('homeNav')
                @yield('moreNav')
                @if(session()->has('user'))

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">{{ session('user')->first_name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                        @if(session('user')->role->name == 'user')
                            <li><a href="{{ url('energijapp/profile/'.session('user')->id) }}">Profil</a></li>
                            <li><a href="{{ url('energijapp/reservations/user').'/'.session('user')->id }}">Rezervacije</a></li>
                        @endif

                        @if(session('user')->role->name == 'admin' || session('user')->role->name == 'operator')
                            <li><a href="{{ url('/energijapp/search') }}">EnergijApp</a></li>
                        @endif

                        @if(session('user')->role->name == 'admin')
                            <li><a href="{{ url('/admin') }}">Admin</a></li>
                            <li><a href="{{ asset('files/dipl_php_lara_jovan_rankovic_145_14') }}">Dokumentacija</a></li>
                        @endif

                            <li><a href="{{ url('/logout') }}">Izloguj se</a></li>
                        </ul>
                    </li>

                @else
                    <li><a href="#" data-toggle="modal" data-target=".log-sign">Logovanje</a></li>
                @endif

            </ul>
        </div>

    </div>
</div>

@if(!session()->has('user'))
<!-- Log in/Sign up Modal -->
<div class="modal fade bs-modal-sm log-sign" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="bs-example bs-example-tabs">
                <ul id="myTab" class="nav nav-tabs">
                    <li id="tab1" class=" active tab-style login-shadow "><a href="#signin" data-toggle="tab">Uloguj se</a></li>
                    <li id="tab2" class=" tab-style "><a href="#signup" data-toggle="tab">Registruj se</a></li>

                </ul>
            </div>
            <div class="modal-body">
                <div id="myTabContent" class="tab-content">

                    <!-- Login Form -->
                    <div class="tab-pane fade active in" id="signin">
                        <form class="form-horizontal" method="POST" action="{{ url('/login') }}">
                            <fieldset>
                                @csrf

                                <div class="group">
                                    <input class="input" type="text" id="logEmail" name="logEmail" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="logEmail">E-mail</label>
                                </div>

                                <div class="group">
                                    <input class="input" type="password" id="logPasswd" name="logPasswd" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="logPass">Lozinka</label>
                                </div>
                                <em></em>

                                <div class="control-group">
                                    <label class="control-label" for="signin"></label>
                                    <div class="controls">
                                        <button id="logBtn" name="logBtn" class="btn btn-primary btn-block">Potvrdi</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                    <!-- Registration Form -->
                    <div class="tab-pane fade" id="signup">
                        <form class="form-horizontal" method="POST" action="{{ url('/register') }}">
                            <fieldset>
                                @csrf
                                <div class="group">
                                    <input class="input" type="text" id="regFN" name="regFN" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="regFN">Ime</label></div>

                                <div class="group">
                                    <input class="input" type="text" id="regLN" name="regLN" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="regLN">Prezime</label></div>

                                <div class="group">
                                    <input class="input" type="text" id="email" name="email" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="regEmail">E-mail</label></div>

                                <div class="group">
                                    <input class="input" type="password" id="regPasswd" name="regPasswd" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="regPasswd">Lozinka</label></div>
                                <em></em>

                                <div class="control-group">
                                    <label class="control-label" for="signup"></label>
                                    <div class="controls">
                                        <button id="regBtn" name="regBtn" class="btn btn-primary btn-block">Potvrdi</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Log in/Sign up Modal END -->
@endif
