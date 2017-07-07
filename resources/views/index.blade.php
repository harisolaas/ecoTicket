@extends('master')

@section('title')
    Home
@endsection

@section('main')
    <main class="container-fluid main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{asset('img/1.jpg')}}" alt="Los Angeles">
                    <div class="carousel-caption">
                        <h3>Soluciones digitales a problemas cotidianos</h3>
                        <p><strong>El ticket digital ya llegó</strong> y es tan simple como pedir tu versión digital en locales adheridos.</p>
                        <p><a class="btn btn-primary btn-lg" href="#" role="button">Cómo funciona... »</a> <a class="btn btn-primary btn-lg" href="#" role="button">Registrar comercio »</a></p>
                     </div>
                </div>

                <div class="item">
                    <img src="{{asset('img/2.jpg')}}" alt="Chicago">
                    <div class="carousel-caption">
                        <h3>Soluciones digitales a problemas cotidianos</h3>
                        <p><strong>El ticket digital ya llegó</strong> y es tan simple como pedir tu versión digital en locales adheridos.</p>
                        <p><a class="btn btn-primary btn-lg" href="#" role="button">Cómo funciona... »</a> <a class="btn btn-primary btn-lg" href="#" role="button">Registrar comercio »</a></p>
                     </div>
                </div>

                <div class="item">
                    <img src="{{asset('img/3.jpg')}}" alt="New York">
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Soluciones digitales a problemas cotidianos</h3>
                            <p><strong>El ticket digital ya llegó</strong> y es tan simple como pedir tu versión digital en locales adheridos.</p>
                            <p><a class="btn btn-primary btn-lg" href="#" role="button">Cómo funciona... »</a> <a class="btn btn-primary btn-lg" href="#" role="button">Registrar comercio »</a></p>
                        </div>                        
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </main>
@endsection
