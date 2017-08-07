@extends('_dashboard')

@section('title', 'Home')

@section('h1')
    ecoTicket
@endsection

@section('sidebar')
    <ul class="nav nav-sidebar">
        <li class="active"><a href="/home">Tus compras</a></li>
        <li><a href="home/promotions">Promos</a></li>
    </ul>
@endsection

@section('panels')
    <div class="container-fluid">
        <h2>Promos</h2>
        <div class="row">
            <div class="col-xs-12">
                <div id="myCarousel" class="carousel slide">
                    <ol id="carousel_ol" class="carousel-indicators">
                        @for ($i=0; $i < count($grouped_promotions); $i++)
                            <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                        @endfor
                    </ol>
                    <script type="text/javascript">
                        var active = document.getElementById('carousel_ol').querySelector('li')
                        active.classList.toggle('active')
                    </script>

                    <div id="carousel_inner" class="carousel-inner">

                        @foreach ($grouped_promotions as $promotion_group)
                            <div class="item">
                                <div class="row-fluid">
                                    @foreach ($promotion_group as $promotion)
                                        <div class="col-xs-3">
                                            @include('promotion-display', $promotion)
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <script type="text/javascript">
                                var active = document.getElementById('carousel_inner').querySelector('.item')
                                active.classList.toggle('active')
                            </script>
                        @endforeach

                    </div>

                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <h2>Tus Tickets</h2>
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
                                    <div class="row">
                                        <div class="col-xs-6 flex-center">
                                            <a class="btn btn-primary" target='blank' href="/file/download/{{ $transaction->id }}">Descargar</a>
                                        </div>
                                        <div class="col-xs-6 flex-center">
                                            <a class="btn btn-primary" target='blank' href="/file/print/{{ $transaction->id }}">Imprimir</a>
                                        </div>
                                    </div>
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
@endsection

@section('scripts')
    @parent
@endsection
