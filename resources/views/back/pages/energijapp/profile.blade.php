@extends('layouts.back')

@section('content')
    @include('back.partials.energijapp.profile.info')
</div>
</div>
    <div class="col-xs-12 col-sm-8">
        <div class="card">
            <div class="body">
                <div id="app">

                    @include('back.partials.energijapp.profile.tabs')

                    <div class="tab-content">

                        @if($user->role->name == 'user')
                            <user-payment-arrivals user_id="{!! $user->id !!}"></user-payment-arrivals>
                            @if(session('user')->role->name == 'admin' || session('user')->role->name == 'operator')
                                <user-payments user_id="{!! $user->id !!}"></user-payments>
                            @endif
                        @endif
                        @if(session('user')->id == $user->id)
                            <change-password user_id="{!! session('user')->id !!}"></change-password>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
