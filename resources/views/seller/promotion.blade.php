@extends('_dashboard')

@section('title', 'Business Dashboard')

@section('h1')
    ecoTicket Business
@endsection

@section('sidebar')
    <ul class="nav nav-sidebar" style="margin-bottom:0px;">
        <li><a href="/seller/home">Vista general </a></li>
        <li><a href="/seller/home/new-ticket">Nuevo Ticket </a></li>
        <li><a href="/seller/home/all-tickets">Todos mis Tickets </a></li>
        <li><a href="/seller/home/products">Productos </a></li>
        <li>
            <a href="/seller/home/promotions">Promociones </a>
        </li>
    </ul>
    <ul class="nav nav-sidebar" style="background-color:#F5F5F5">
        @foreach ($promotions as $prom)
            <li class="{{ $prom->id == $promotion->id ? 'active' : '' }}"><a href="/seller/home/promotion/{{ $prom->id }}">{{ $prom->title }}</a></li>
        @endforeach
    </ul>
@endsection

@section('panels')
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#preview">Vista previa</a></li>
        <li><a data-toggle="tab" href="#edit">Editar</a></li>
    </ul>

    <div class="tab-content">
        <div id="preview" class="tab-pane fade in active">
            <div class="promotion-container">
                <div class="promotion-handlers">
                            <form id="promotion-delete-form-{{ $promotion->id }}" data-form="promotion-delete" action="/seller/promotion/delete" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="promotion_id" value="{{ $promotion->id }}">
                                <input class="btn btn-link" type="submit" name="submit" value="Borrar">
                            </form>

                            <form id="promotion-toggle-form-{{ $promotion->id }}" data-form="promotion-toggle" action="/seller/promotion/toggle" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="promotion_id" value="{{ $promotion->id }}">
                                <input class="btn btn-link" type="submit" name="submit" data-toggle='modal' data-target='#modal' value="{{ $promotion->active ? 'Dejar de publicar' : 'Publicar' }}">
                            </form>
                </div>
                @include('promotion-display', compact('promotion'))
                <div class="promotion-status">
                    @if ($promotion->active)
                        <p class="alert alert-success"><span class="icon ion-checkmark-round"></span>  La promoción está activa!</p>
                    @else
                        <p class="alert alert-danger"><span class="icon ion-close-round"></span>  La promoción está sin publicar!</p>
                    @endif
                </div>
            </div>
        </div>

        <div id="edit" class="tab-pane fade">
            <form id="edit-prom-form" action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Título:</label>
                    <p>(máximo 25 carácteres)</p>
                    <input class="form-control" type="text" name="title" value="{{ $promotion->title }}">
                </div>
                <div class="form-group">
                    <label for="desc">Descripción:</label>
                    <p>(máximo 60 carácteres)</p>
                    <input class="form-control" type="text" name="desc" value="{{ $promotion->desc }}">
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
    <script type="text/javascript" src="{{ asset('js/seller/update-prom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/seller/toggle-prom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/seller/delete-prom.js') }}"></script>
@endsection
