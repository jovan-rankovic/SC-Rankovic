<!DOCTYPE html>
<html lang="en">
    @include('back.partials.common.head')
    <body class="theme-deep-purple">
        @include('back.partials.common.loader')
        @include('back.partials.common.nav')

        @if(str_contains(url()->current(), '/admin'))
            @include('back.partials.admin.sidebar')
        @elseif(str_contains(url()->current(), '/energijapp/profile/') || (str_contains(url()->current(), '/energijapp/reservations') && session('user')->role->name == 'user'))
            @if(session('user')->role->name == 'user')
                @include('back.partials.energijapp.user.sidebar')
            @else
                @include('back.partials.energijapp.operator.sidebar')
            @endif
        @else
            @include('back.partials.energijapp.operator.sidebar')
        @endif

        <section class="content" id="content">
            <div class="container-fluid">

                @if(str_contains(url()->current(), '/profile'))
                    @include('back.partials.energijapp.profile.wrapper')
                @else
                    @include('back.partials.common.wrapper')
                @endif

            </div>
        </section>

        @include('back.partials.common.scripts')
    </body>
</html>
