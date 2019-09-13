@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">euro_symbol</i> Cene<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Prikaz svih cena</small>
            <hr/>
            <a href="{{ url('admin/prices/create') }}" class="btn btn-dark waves-effect"><i class="material-icons">add</i><strong>Dodaj</strong></a>
        </h2>
    </div>
@endsection

@section('content')

    @php($i = 1)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr class="dark">
                <th>Naziv paketa</th>
                <th>Broj termina</th>
                <th>Iznos</th>
                <th>Izmeni</th>
                <th>Obriši</th>
            </tr>
            </thead>
            <tbody>

            @foreach($prices as $price)

                <tr>
                    <td>{{ $price->title }}</td>
                    <td>{{ $price->sessions }}</td>
                    <td>{{ $price->amount }} din.</td>
                    <td><a href="{{ url('/admin/prices/'.$price->id.'/edit') }}" class="btn btn-dark waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
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
                                        <button type="button" class="btn btn-danger waves-effect" onclick="deletion({{ $price->id }}, '{{ $price->getTable() }}');">
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

    <div class="text-center">{{ $prices->links() }}</div>
@endsection
