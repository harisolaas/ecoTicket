@extends('_dashboard')

@php
    $modal = [
        'title' => 'Destinatario',
        'body' => 'E-mail del cliente:',
        'inputs' => [
            'user_email' => 'email'
        ]
    ];
@endphp

@section('title', 'Business Dashboard')

@section('h1')
    ecoTicket Business
@endsection

@section('sidebar')
    <ul class="nav nav-sidebar">
        <li><a href="/seller/home">Vista general </a></li>
        <li class="active"><a href="#">Nuevo Ticket </a></li>
        <li><a href="/seller/home/all-tickets">Todos mis Tickets </a></li>
        <li><a href="/seller/home/products">Productos </a></li>
        <li><a href="/seller/home/promotions">Promociones </a></li>
    </ul>
@endsection

@section('panels')

        <form id="create-ticket-form" action="" method="post">
            {{ csrf_field() }}
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Enviar/<br>Eliminar</th>
                        <th>Código de barras</th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody id='tk-gen-tbody'>
                </tbody>
                <tfoot>
                    <tr class="alert alert-info">
                        <td colspan="5">
                            <a id='add-prod' href=""><span class="icon ion-plus-circled"></span>  Agregar producto...</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Total</td>
                        <td style="text-align:right">$ </td>
                        <td id='total'>0.00</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align:center">
                            <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal">Enviar Ticket</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
            @include('_modal', compact($modal))
        </form>

@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('js/seller/create-ticket.js') }}"></script>
@endsection
