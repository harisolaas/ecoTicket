@extends('master')

@section('title')
    Productos
@endsection

@section('main')
    <main class="container-fluid main">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Mis productos</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Marca</th>
                            <th>Editar/Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $id => $product)
                            <tr>
                                <td><img class="img-sm img-rounded" src="{{asset("storage/product/595aacd29bb54.jpg")}}" alt="product-image"></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>
                                    <a class="btn btn-default" href="/products/{{$product->id}}/edit">Editar</a>
                                    <a class="btn btn-default" href="/products/{{$product->id}}/delete">Borrar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

@endsection
