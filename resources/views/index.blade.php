@extends('master')

@section('title')
    Home
@endsection

@section('main')
    <main class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <h1>Soluciones digitales a problemas cotidianos</h1>
                <p><strong>El ticket digital ya llegó</strong> y es tan simple como pedir tu versión digital en locales adheridos.</p>
                <br>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Cómo funciona... »</a> <a class="btn btn-primary btn-lg" href="#" role="button">Registrar comercio »</a></p>
            </div>
        </div>

        <div class="container">
            <section>
                <div class="row">
                    <div class="col-md-4">
                        <span class="icon ion-leaf"></span>
                        <h3></h3>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <span class="icon ion-ios-paper"></span>
                        <h3>Llevá tus cuentas al día</h3>
                        <p></p>
                    </div>
                    <div class="col-md-4">
                        <span class="icon ion-bag"></span>
                        <h3>Asegurá tus compras</h3>
                        <p><strong>La fidelidad de ecoTicket permite que revises cualquier transacción</strong> que hayas realizado en caso de que necesites fundamentar un reclamo</p>
                    </div>

                </div>
            </section>
        </div>
    </main>
@endsection
