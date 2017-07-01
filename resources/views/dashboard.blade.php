@extends('master')
@section('title')
    ecoTicket :: Dashboard
@endsection
@section('main')
    <div class="container-fluid main" style="margin-top:60px;">

        <div class="row">
            <div class="col-sm-3 col-xs-4 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="#">Tus compras</a></li>
                    <li><a href="#">Promos</a></li>
                </ul>

            </div>
            <div class="col-sm-9 col-xs-8">
                <h1 class="page-header">my-ecoTicket</h1>

                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                {{-- @foreach ($variable as $key => $value)

                                @endforeach --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($transactions as $transaction)
                                <tr>
                                    @foreach ($transaction as $campo)
                                        <td>{{$transaction->campo}}</td>
                                    @endforeach
                                </tr>
                            @endforeach --}}
                        </tbody>

                    </table>

                </div>
            </div>

        </div>

    </div>
@endsection
