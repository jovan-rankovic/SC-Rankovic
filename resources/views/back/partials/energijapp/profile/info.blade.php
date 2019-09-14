<div class="profile-header">&nbsp;</div>
<div class="profile-body">
    <div class="image-area">
        <img id="profile-image" src="{{ asset($user->image) }}" width="135" height="135" alt="AdminBSB - Profile Image" />
        <form action="{{ url('/energijapp/images/user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <input id="imgUser" name="imgUser" class="hidden" type="file" onchange="this.form.submit();"/>
        </form>

        <h6 class="text-center">Klikni sliku za promenu</h6>
    </div>
    <div class="content-area">
        <h3>{{ $user->first_name.' '.$user->last_name }}</h3>
        <p>{{ $user->card_number }}</p>
    </div>
</div>
<div class="profile-footer">
    <ul>
        <li>
            <span>Član od</span>
            <span>{{ $user->created_at->format('d.m.Y.') }}</span>
        </li>
        <li>
            <span>Datum rođenja</span>
            <span>{{ Carbon\Carbon::parse($user->birth_date)->format('d.m.Y.') }}</span>
        </li>
        <li>
            <span>Telefon</span>
            <span>{{ $user->phone }}</span>
        </li>
        <li>
            <span>E-mail</span>
            <span>{{ $user->email }}</span>
        </li>
    </ul>
    @if(session('user')->role->name == 'admin' || session('user')->role->name == 'operator')
        <a href="{{ url('/energijapp/users/'.$user->id.'/edit') }}" class="btn btn-dark btn-lg waves-effect btn-block">IZMENI</a>
        @if($user->id != session('user')->id)
            <a class="btn btn-dark btn-lg waves-effect btn-block" href="mailto:{{ $user->email }}">POŠALJI PORUKU</a>
        @endif
    @endif
</div>
