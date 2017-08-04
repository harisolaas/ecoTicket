@extends('_dashboard')

@section('title', 'Business Dashboard')

@section('h1')
    ecoTicket Business
@endsection

@section('sidebar')
    <ul class="nav nav-sidebar">
        <li><a href="/seller/home">Overview </a></li>
        <li><a href="/seller/home/new-ticket">Nuevo Ticket </a></li>
        <li><a href="/seller/home/all-tickets">Todos mis Tickets </a></li>
        <li class="active">
            <a href="#">Promociones </a>
            <ul>
                @foreach ($promotions as $prom)
                    <li><a {{ $prom->id == $id ? 'class="active"' : null}} href="/seller/home/promotion/{{ $promotion->id }}"></a></li>
                @endforeach
            </ul>
        </li>
    </ul>
@endsection

@section('panels')
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#preview">Vista previa</a></li>
        <li><a data-toggle="tab" href="#edit">Editar</a></li>
    </ul>

    <div class="tab-content">
        <div id="preview" class="tab-pane fade in active">
            <div class="promotion-box">
                <img src="{{ $promotion->banner_path }}" alt="promotion-banner">
                <h3>{{ $promotion->title }}</h3>
                <p>{{ $promotion->desc }}</p>
            </div>
        </div>

        <div id="edit" class="tab-pane fade">
            <form id="edit-prom-form" action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Título:</label>
                    <p>(máximo 15 carácteres)</p>
                    <input class="form-control" type="text" name="title" value="{{ $promotion->title }}">
                </div>
                <div class="form-group">
                    <label for="desc">Descripción:</label>
                    <p>(máximo 40 carácteres)</p>
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
@endsection
