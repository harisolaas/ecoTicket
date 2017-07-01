@extends('master')

@section('title')
    Nuevo producto
@endsection

@section('main')
    <main class="container-fluid main">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <ul class="breadcrumb">
                    <li id="step1-crumb" class="active"><a data-toggle="tab" href="#step1">Código de barras</a></li>
                    <li id="step2-crumb"><a data-toggle="tab" href="#step2">Nombre</a></li>
                    <li id="step3-crumb"><a data-toggle="tab" href="#step3">Precio</a></li>
                    <li id="step4-crumb"><a data-toggle="tab" href="#step4">Marca</a></li>
                    <li id="newProdDriver-crumb"><a data-toggle="tab" href="#driver">Listo</a></li>
                </ul>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 tab-content">

                        <form id="pd-builder-form" action="">
                            <input type="hidden" name="token" value="{{csrf_token()}}">
                            <div id="step1" class="form-group panel panel-info">
                                <div class="panel-heading">
                                    <p>Ingresá el código de barras del nuevo producto.</p>
                                </div>
                                <div class="panel-body">
                                    <label for="barcode">Código de barras</label>
                                    <input type="text" name="barcode">
                                </div>
                            </div>
                            <div id="step2" class="form-group panel panel-info hidden">
                                <div class="panel-heading">
                                    Ingresá el nombre del nuevo producto.
                                </div>
                                <div class="panel-body">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name">
                                </div>
                            </div>
                            <div id="step3" class="form-group panel panel-info hidden">
                                <div class="panel-heading">
                                    Ingresá el precio del nuevo producto.
                                </div>
                                <div class="panel-body">
                                    <label for="price">Precio</label>
                                    <input type="number" name="price">
                                </div>
                            </div>
                            <div id="step4" class="form-group panel panel-info hidden">
                                <div class="panel-heading">
                                    Seleccioná la marca del nuevo producto.
                                </div>
                                <div class="panel-body">
                                    <label for="brand_id">Marca:</label>
                                    <select class="" name="brand_id">
                                        <option value="NULL">Seleccioná...</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button id='newProdButton' type="submit" class="btn btn-default">Siguiente</button>
                        </form>

                        <div class="hidden panel panel-success" id="driver">
                            <div class="panel-heading">
                                <p>Listo</p>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 flex-center" >
                                        <a class="btn btn-default" href="">Cargar otro producto</a>
                                    </div>
                                    <div class="col-md-6 flex-center" >
                                        <a class="btn btn-default" href="#">Volver al inicio</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </main>
    {{-- <script type="text/javascript" src="{{asset('js/product/create.js')}}"></script> --}}
@endsection
