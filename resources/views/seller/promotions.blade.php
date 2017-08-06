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
                @foreach ($promotions as $promotion)
                    <li><a href="/seller/home/promotion/{{ $promotion->id }}"></a></li>
                @endforeach
            </ul>
        </li>
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
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($promotions as $promotion)
                        <tr>
                            <td colspan="2">Algo{{ $promotion->title }}</td>
                            <td>{{ $promotion->active ? 'Activa' : 'Sin publicar' }}</td>
                            <td>
                                <form action="set-active" method="post">
                                    <input class="btn btn-link" type="submit" name="send" value="Publicar...">
                                </form>
                            </td>
                            <td><a href="#">Ver...</a></td>
                            <td><a href="#">Editar...</a></td>
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
@endsection
