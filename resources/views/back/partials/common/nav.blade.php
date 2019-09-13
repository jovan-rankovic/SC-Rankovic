<div class="overlay"></div>

<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>

            @if(str_contains(url()->current(), '/admin'))
                <b><a class="navbar-brand" href="{{ url('/admin') }}">Administracija</a></b>
            @else
                @if(session('user')->role->name == 'user')
                    <b><a class="navbar-brand" href="{{ url('/energijapp/profile/'.session('user')->id) }}">EnergijApp</a></b>
                @else
                    <b><a class="navbar-brand" href="{{ url('/energijapp/search') }}">EnergijApp</a></b>
                @endif
            @endif

        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/') }}"><i class="material-icons">directions_run</i><b class="pull-left">Izlaz</b></a></li>
            </ul>
        </div>
    </div>
</nav>
