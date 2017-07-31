@extends('seller.home')
<div id="sales">
    <div id="sales_chart"></div>
    @areachart('Ventas', 'sales_chart')
</div>

<div id="top-products">
    <div id="products_chart">
        <table class="table table-striped fs-7 max-width-400">
            <thead>
                <tr>
                    <th></th>
                    <th>Producto</th>
                    <th>Ingresos</th>
                    <th>Ventas Únicas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($topProducts as $rank => $product)
                    <tr>
                        <td>{{$rank+1}}</td>
                        <td>{{$product['name']}}</td>
                        <td>$ {{$product['revenue']}}</td>
                        <td>{{$product['sales']}}</td>
                    </tr>
                @empty
                    No se encontraron productos.
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('js/dashboard/real-time-sales.js') }}"></script>
@endsection
