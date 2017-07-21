@extends('_dashboard')

@section('title', 'Business Dashboard')

@section('sidebar')
    <ul class="nav nav-sidebar">
        <li class="active"><a href="https://getbootstrap.com/examples/dashboard/#">Overview <span class="sr-only">(current)</span></a></li>
        <li><a href="https://getbootstrap.com/examples/dashboard/#">Reports</a></li>
        <li><a href="https://getbootstrap.com/examples/dashboard/#">Analytics</a></li>
        <li><a href="https://getbootstrap.com/examples/dashboard/#">Export</a></li>
    </ul>
@endsection

@section('h1')
    ecoTicket Business
@endsection

@section('panels')
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
@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('js/dashboard/real-time-sales.js') }}"></script>
@endsection
