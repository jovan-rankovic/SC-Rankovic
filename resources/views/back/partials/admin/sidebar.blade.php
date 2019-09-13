<section>
    <aside id="leftsidebar" class="sidebar">

        <!-- User info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ secure_asset(session('user')->image) }}" width="79" height="79" alt="Admin" />
            </div>
            <div class="pull-right">
                <img src="{{ secure_asset('/images/logo/scr.png') }}" width="99" height="99" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session('user')->first_name }} {{ session('user')->last_name }}</div>
                <div class="email">{{ session('user')->email }}</div>
            </div>
        </div>
        <!-- User info END -->

        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">BRZI MENI</li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">person</i>
                        <span>Korisnici</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/users') }}">Prikaži</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/users/create') }}">Dodaj</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">border_color</i>
                        <span>Postovi</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/posts') }}">Prikaži</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/posts/create') }}">Dodaj</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">burst_mode</i>
                        <span>Slider</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/sliders') }}">Prikaži</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/sliders/create') }}">Dodaj</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">link</i>
                        <span>Meni linkovi</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/menus') }}">Prikaži</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/menus/create') }}">Dodaj</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">sports</i>
                        <span>Treneri</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/trainers') }}">Prikaži</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/trainers/create') }}">Dodaj</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">fitness_center</i>
                        <span>Treninzi</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/trainings') }}">Prikaži</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/trainings/create') }}">Dodaj</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">euro_symbol</i>
                        <span>Cene</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/prices') }}">Prikaži</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/prices/create') }}">Dodaj</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">group_work</i>
                        <span>Usluge</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/services') }}">Prikaži</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/services/create') }}">Dodaj</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">share</i>
                        <span>Socialne mreže</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/socials/') }}">Prikaži</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/socials/create') }}">Dodaj</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ url('/admin/arrivals') }}" class="menu-info">
                        <i class="material-icons">arrow_downward</i>
                        <span>Dolasci</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/payments') }}" class="menu-info">
                        <i class="material-icons">show_chart</i>
                        <span>Uplate</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/energijapp/search') }}" class="menu-info">
                        <i class="material-icons">apps</i>
                        <span>EnergijApp</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Menu END -->

        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 Jovan Ranković
            </div>
        </div>
        <!-- Footer END -->

    </aside>
</section>
