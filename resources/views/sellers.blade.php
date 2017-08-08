@extends('_dashboard')
@section('title', 'Comercios')

@section('h1')
    ecoTicket
@endsection

@section('sidebar')
    <ul class="nav nav-sidebar">
        <li><a href="/home">Tus compras</a></li>
        <li class="active"><a href="#">Comercios</a></li>
    </ul>
@endsection

@section('panels')
    <table class="table table-striped">
        <theader>
            <tr>
                <th>Comercio</th>
                <th>Última compra</th>
            </tr>
        </theader>
        <tbody>
            @forelse ($sellers as $seller)
                <tr>
                    <td>{{ $seller->name }}</td>
                    <td>{{ date($seller->transactions->first()->created_at) }}</td>
                </tr>
            @empty

            @endforelse
            <tr>

            </tr>
        </tbody>
    </table>
@endsection

@section('scripts')
    @parent
@endsection
