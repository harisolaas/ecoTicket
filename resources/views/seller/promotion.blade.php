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
            @include('promotion-display', compact('promotion'))
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
@endsection
