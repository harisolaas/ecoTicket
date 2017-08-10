@extends('_dashboard')

@section('title', 'Productos')

@section('h1')
    ecoTicket Business
@endsection

@section('sidebar')
    <ul class="nav nav-sidebar">
        <li><a href="/seller/home">Vista general </a></li>
        <li><a href="/seller/home/new-ticket">Nuevo Ticket </a></li>
        <li><a href="/seller/home/all-tickets">Todos mis Tickets </a></li>
        <li class="active"><a href="#">Productos </a></li>
        <li><a href="/seller/home/promotions">Promociones </a></li>
    </ul>
@endsection

@section('panels')
    <h1>Mis productos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Código de barras</th>
                <th>Editar/Borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $id => $product)
                <tr>
                    <td><img class="img-sm img-rounded" src="{{asset("img/ecoticket_logo.jpg")}}" alt="product-image"></td>
                    <td>{{$product->name}}</td>
                    <td>$ {{$product->price}}</td>
                    <td>{{$product->brand->name}}</td>
                    <td>{{$product->barcode}}</td>
                    <td>
                        <a class="btn btn-default" href="/products/{{$product->id}}/edit">Editar</a>
                        <a class="btn btn-default" href="/products/{{$product->id}}/delete">Borrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    @parent
@endsection
