@extends('master')
@section('title')
    ecoTicket :: Dashboard
@endsection
@section('main')
    <div class="container-fluid main">

        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-3 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="#">Tus compras</a></li>
                    <li><a href="#">Promos</a></li>
                </ul>
            </div>

            <div class="col-md-10 col-sm-9 col-xs-9 dashboard">
                <h1 class="page-header">my-ecoTicket</h1>

                <div class="container-fluid">
                    <div class="row heading">
                        <div class="col-xs-3">
                            <strong>Fecha</strong>
                        </div>
                        <div class="col-xs-4">
                            <strong>Comercio</strong>
                        </div>
                        <div class="col-xs-3">
                            <strong>Monto total</strong>
                        </div>
                        <div class="col-xs-2">
                            <strong></strong>
                        </div>
                    </div>

                        @forelse ($transactions as $key => $transaction)
                            <div class="row">
                                <div class="col-xs-3">{{$transaction->created_at->format('d-m-Y')}}</div>
                                <div class="col-xs-4">{{$transaction->seller->name}}</div>
                                <div class="col-xs-3">$ {{$transaction->total_amount}}</div>
                                <div class="col-xs-2"><a class="details" data-toggle="details{{$key}}" href="#">Detalles...</a></div>
                            </div>
                            <div class="row hidden" id="details{{$key}}">
                                <div class="col-xs-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Marca</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaction->products as $id => $product)
                                                <tr>
                                                    <td><img class="img-sm img-rounded" src="{{asset('img/'.$product->productImage->name)}}" alt="product-image"></td>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->price}}</td>
                                                    <td>{{$product->brand->name}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @empty
                            <div class="row">
                                <p class="alert alert-info">No hay transacciones aún!</p>
                            </div>
                        @endforelse
                </div>
            </div>

        </div>

    </div>
    <script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>
@endsection
