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
                <div class="email font-bold">00003</div>
            </div>
        </div>
        <!-- User info END -->

        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">BRZI MENI</li>

                <li>
                    <a href="{{ url('/energijapp/profile').'/'.session('user')->id }}" class="menu-info">
                        <i class="material-icons">person</i>
                        <span>Profil</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/energijapp/reservations/user').'/'.session('user')->id }}" class="menu-info">
                        <i class="material-icons">schedule</i>
                        <span>Rezervacije</span>
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
