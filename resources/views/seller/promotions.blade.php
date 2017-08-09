@extends('_dashboard')

@section('title', 'Business Dashboard')

@section('h1')
    ecoTicket Business
@endsection

@section('sidebar')
    <ul class="nav nav-sidebar" style="margin-bottom:0px;">
        <li><a href="/seller/home">Overview </a></li>
        <li><a href="/seller/home/new-ticket">Nuevo Ticket </a></li>
        <li><a href="/seller/home/all-tickets">Todos mis Tickets </a></li>
        <li><a href="/seller/home/products">Productos </a></li>
        <li class="active">
            <a href="#">Promociones </a>
        </li>
    </ul>
    <ul class="nav nav-sidebar" style="background-color:#F5F5F5">
        @foreach ($promotions as $promotion)
            <li><a href="/seller/home/promotion/{{ $promotion->id }}">{{ $promotion->title }}</a></li>
        @endforeach
    </ul>
@endsection

@section('panels')

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#index">Tus Promos</a></li>
        <li><a data-toggle="tab" href="#new-prom">Nueva Promo</a></li>
    </ul>

    <div class="tab-content">
        <div id="index" class="tab-pane fade in active">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th colspan="2">Título</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($promotions as $promotion)
                        <tr>
                            <td colspan="2">{{ $promotion->title }}</td>
                            <td>{{ $promotion->active ? 'Activa' : 'Sin publicar' }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Opciones
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button onclick="location='/seller/home/promotion/{{ $promotion->id }}'" class="btn btn-link" href="#">Editar</button>
                                        </li>
                                        <li>
                                            <form id="promotion-delete-form-{{ $promotion->id }}" data-form="promotion-delete" action="/seller/promotion/delete" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="promotion_id" value="{{ $promotion->id }}">
                                                <input class="btn btn-link" type="submit" name="submit" value="Borrar">
                                            </form>
                                        </li>
                                        <li>
                                            <form id="promotion-toggle-form-{{ $promotion->id }}" data-form="promotion-toggle" action="/seller/promotion/toggle" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="promotion_id" value="{{ $promotion->id }}">
                                                <input class="btn btn-link" type="submit" name="submit" data-toggle='modal' data-target='#modal' value="{{ $promotion->active ? 'Dejar de publicar' : 'Publicar' }}">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"><p class="alert alert-info">No hay promociones aún!</p></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div id="new-prom" class="tab-pane fade">
            <form id="new-prom-form" action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Título:</label>
                    <p>(máximo 25 carácteres)</p>
                    <input class="form-control" type="text" name="title" value="">
                </div>
                <div class="form-group">
                    <label for="desc">Descripción:</label>
                    <p>(máximo 60 carácteres)</p>
                    <input class="form-control" type="text" name="desc" value="">
                </div>
                <div class="form-group">
                    <label for="title">Imagen:</label>
                    <p>(máximo 200KB)</p>
                    <input class="form-control-file" type="file" name="banner" value="">
                </div>
                <button type="submit" class="btn btn-primary" data-toggle='modal' data-target='#modal'>Enviar</button>
            </form>
        </div>
    </div>
    <div id="modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" style="text-align:center;">
                    <span id='spinner' class='fa fa-spinner fa-spin' style="font-size:40px;"></span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('js/seller/new-prom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/seller/toggle-prom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/seller/delete-prom.js') }}"></script>
@endsection
