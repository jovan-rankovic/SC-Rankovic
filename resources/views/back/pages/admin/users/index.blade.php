@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">person</i> Korisnici<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Prikaz svih korisnika</small>
            <hr/>
            <a href="{{ url('admin/users/create') }}" class="btn btn-dark waves-effect"><i class="material-icons">add</i><strong>Dodaj</strong></a>
        </h2>
    </div>
@endsection

@section('content')

    @php($i = 1)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr class="dark">
                <th>Broj kartice</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>E-mail</th>
                <th>Uloga</th>
                <th>Član od</th>
                <th>Datum rođenja</th>
                <th>Telefon</th>
                <th>Adresa</th>
                <th>Slika</th>
                <th>Izmeni</th>
                <th>Obriši</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)

            <tr>
                <td>{{ $user->card_number }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role->name) }}</td>
                <td>{{ $user->created_at->format('d.m.Y.') }}</td>
                <td>{{ $user->birth_date }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td><img class="img-responsive" width="52" height="52" src="{{ secure_asset($user->image) }}"/></td>
                <td><a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="btn btn-dark waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
                <td>
                    <a class="btn dtp-btn-clear waves-effect btn-xs" href="#" data-toggle="modal" data-target="#delete-modal{{ $i }}">
                        <i class="material-icons">delete_forever</i>
                    </a>
                    <div class="modal fade" id="delete-modal{{ $i++ }}" role="dialog">
                        <div class="modal-dialog modal-sm text-center">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal">
                                        &times;
                                    </button>
                                    <h4>Da li ste sigurni?</h4>
                                    <button type="button" class="btn btn-danger waves-effect" onclick="deletion({{ $user->id }}, '{{ $user->getTable() }}');">
                                        Obriši
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            @endforeach

            </tbody>
        </table>
    </div>

    <div class="text-center">{{ $users->links() }}</div>
@endsection
