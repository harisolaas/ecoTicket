@extends('master')
@section('title', 'Dashboard')
@section('main')
    <div class="container-fluid">

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

                    <div class="panel-group" id="accordion">

                        @forelse ($transactions as $key => $transaction)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">{{$transaction->created_at->format('d-m-Y')}}</div>
                                        <div class="col-xs-4">{{$transaction->seller->name}}</div>
                                        <div class="col-xs-3">$ {{$transaction->total_amount}}</div>
                                        <div class="col-xs-2"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#details{{$key}}">Detalles</a></div>
                                    </div>
                                </div>
                                <div id="details{{$key}}" class="panel-collapse collapse transaction-details">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-8 col-xs-offset-2">
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
                                                                <td><img class="img-xs img-rounded" src="{{asset('img/'.$product->productImage->name)}}" alt="product-image"></td>
                                                                <td>{{$product->name}}</td>
                                                                <td>{{$product->price}}</td>
                                                                <td>{{$product->brand->name}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row">
                                <p class="alert alert-info">No hay transacciones aún!</p>
                            </div>
                        @endforelse
                        {{$transactions->links()}}

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
