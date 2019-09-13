@extends('layouts.back')

@section('header')
    <div class="header">
        <h2>
            <i class="material-icons icon_left">border_color</i> Postovi<a href="#" onclick="history.back(-1)"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Nazad</i></a>
            <small>Prikaz svih postova</small>
            <br/>
            <a href="{{ url('admin/posts/create') }}" class="btn btn-dark waves-effect"><i class="material-icons">add</i><strong>Dodaj</strong></a>
        </h2>
    </div>
@endsection

@section('content')

    @php($i = 1)

    <br/>

    @foreach($posts as $post)

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ $post->title }}
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{{ url('/admin/posts/'.$post->id.'/edit') }}">Izmeni</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#delete-modal{{ $i }}">Obriši</a></li>
                                </ul>
                                <div class="modal fade" id="delete-modal{{ $i++ }}" role="dialog">
                                    <div class="modal-dialog modal-sm text-center">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal">
                                                    &times;
                                                </button>
                                                <h4>Da li ste sigurni?</h4>
                                                <button type="button" class="btn btn-danger waves-effect" onclick="deletion({{ $post->id }}, '{{ $post->getTable() }}');">
                                                    Obriši
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#{{ $post->id }}c" data-toggle="tab">Sadržaj</a></li>
                            <li role="presentation"><a href="#{{ $post->id }}s" data-toggle="tab">Slika</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active posts" id="{{ $post->id }}c">
                                <p>
                                    {{ $post->content }}
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="{{ $post->id }}s">
                                <img class="img img-responsive" src="{{ secure_asset($post->image) }}" alt="post_image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <div class="text-center">{{ $posts->links() }}</div>

@endsection
