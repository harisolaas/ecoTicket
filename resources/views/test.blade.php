<div class="panel-group" id="accordion">
    @forelse ($transactions as $key => $transaction)
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">{{$transaction->created_at->format('d-m-Y')}}</div>
                    <div class="col-xs-4">{{$transaction->seller->name}}</div>
                    <div class="col-xs-3">$ {{$transaction->total_amount}}</div>
                    <div class="col-xs-2"><a data-toggle="collapse" data-parent="#accordion" href="#details{{$key}}">Detalles...</a></div>
                </div>
            </div>
            <div id="details{{$key}}" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div class="row">
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
                </div>
            </div>
        </div>

    @empty
        <div class="row">
            <p class="alert alert-info">No hay transacciones aún!</p>
        </div>
    @endforelse

</div>
