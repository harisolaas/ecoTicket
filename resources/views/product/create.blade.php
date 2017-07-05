@extends('master')

@section('title')
    Nuevo producto
@endsection

@section('main')
    <!-- Modal -->
<div class="modal fade" id="reqResponse" tabindex="-1" role="dialog" aria-labelledby="reqResponseLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content panel panel-succes">
      <div class="modal-header panel-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="reqResponseLabel"></h4>
      </div>
      <div class="modal-body panel-body">
      </div>
      <div class="modal-footer">
        <button type="button" id="modalButton1" class="btn btn-primary"></button>
        <button type="button" id="modalButton2" class="btn btn-default"></button>
      </div>
    </div>
  </div>
</div>

    <main class="container-fluid main">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <ul class="breadcrumb">
                    <li class="active"><a data-toggle="tab" href="#step1">Código de barras</a></li>
                    <li><a data-toggle="tab" href="#step2">Nombre</a></li>
                    <li><a data-toggle="tab" href="#step3">Precio</a></li>
                    <li><a data-toggle="tab" href="#step4">Marca</a></li>
                    <li><a data-toggle="tab" href="#step5">Categoría</a></li>
                    <li><a data-toggle="tab" href="#step6">Imagen</a></li>
                    <li><a data-toggle="tab" href="#confirm">Listo</a></li>
                </ul>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <form id="pd-builder-form" action="/products" class="tab-content" enctype="multipart/form-data" method="POST">


                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div id="step1" class="form-group panel panel-info tab-pane fade in active">
                                <div class="panel-heading">
                                    <p>Ingresá el código de barras del nuevo producto.</p>
                                </div>
                                <div class="panel-body">
                                    <label for="barcode">Código de barras</label>
                                    <input type="text" name="barcode">
                                </div>
                            </div>
                            <div id="step2" class="form-group panel panel-info tab-pane fade">
                                <div class="panel-heading">
                                    Ingresá el nombre del nuevo producto.
                                </div>
                                <div class="panel-body">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name">
                                </div>
                            </div>
                            <div id="step3" class="form-group panel panel-info tab-pane fade">
                                <div class="panel-heading">
                                    Ingresá el precio del nuevo producto.
                                </div>
                                <div class="panel-body">
                                    <label for="price">Precio</label>
                                    <input type="number" name="price">
                                </div>
                            </div>
                            <div id="step4" class="form-group panel panel-info tab-pane fade">
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
                            <div id="step5" class="form-group panel panel-info tab-pane fade">
                                <div class="panel-heading">
                                    Seleccioná las categorías del nuevo producto.
                                </div>
                                <div class="panel-body">
                                        @foreach ($categories as $categorie)
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="categories[]" value="{{$categorie->id}}">{{$categorie->name}}</label>
                                            </div>
                                        @endforeach
                                </div>
                            </div>
                            <div id="step6" class="form-group panel panel-info tab-pane fade">
                                <div class="panel-heading">
                                    Ingresá una imagen para el nuevo producto.
                                </div>
                                <div class="panel-body">
                                    <label for="price">Imagen</label>
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <div class="panel panel-primary tab-pane fade" id="confirm">
                                <div class="panel-heading">
                                    <p>Confirmar</p>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-stripped">
                                        <thead>
                                            <tr>
                                                <th>Campo</th>
                                                <th>Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Código de barras</td>
                                                <td>VACÍO</td>
                                                <td><a data-toggle="tab" href="#step1">Modificar...</a></td>
                                            </tr>
                                            <tr>
                                                <td>Nombre</td>
                                                <td>VACÍO</td>
                                                <td><a data-toggle="tab" href="#step2">Modificar...</a></td>
                                            </tr>
                                            <tr>
                                                <td>Precio</td>
                                                <td>VACÍO</td>
                                                <td><a data-toggle="tab" href="#step3">Modificar...</a></td>
                                            </tr>
                                            <tr>
                                                <td>Marca</td>
                                                <td>VACÍO</td>
                                                <td><a data-toggle="tab" href="#step4">Modificar...</a></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-default">Cargar nuevo producto</button>

                        </form>


                    </div>
                </div>

            </div>

        </div>

    </main>
    <script type="text/javascript" src="{{asset('js/product/create.js')}}"></script>
@endsection
