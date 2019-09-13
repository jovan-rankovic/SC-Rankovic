<ul class="nav nav-tabs" role="tablist">
    @if($user->role->name == 'user')
        <li role="presentation" class="active"><a href="#user_arrivals" aria-controls="user_arrivals" role="tab" data-toggle="tab">Dolasci</a></li>
        @if(session('user')->role->name == 'admin' || session('user')->role->name == 'operator')
            <li role="presentation"><a href="#user_payments" aria-controls="user_payments" role="tab" data-toggle="tab">Uplate</a></li>
        @endif
    @endif
    @if(session('user')->id == $user->id)
        <li role="presentation"><a href="#change_password" aria-controls="change_password" role="tab" data-toggle="tab">Promeni lozinku</a></li>
    @endif
</ul>
