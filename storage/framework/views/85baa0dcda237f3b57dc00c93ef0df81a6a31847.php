<?php $__env->startSection('title'); ?>
    Nuevo producto
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <main class="container-fluid main">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <ul class="breadcrumb">
                    <li id="step1-crumb" class="active">Código de barras</li>
                    <li id="step2-crumb"><a href="#">Nombre</a></li>
                    <li id="step3-crumb"><a href="#">Precio</a></li>
                    <li id="newProdDriver-crumb"><a href="#">Listo</a></li>
                </ul>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form id="pd-builder-form" action="">
                            <input type="hidden" name="token" value="<?php echo e(csrf_token()); ?>">
                            <div id="step1" class="form-group">
                                <div class="alert alert-info">
                                    <p>Ingresá el código de barras del nuevo producto.</p>
                                </div>

                                <label for="barcode">Código de barras</label>
                                <input type="text" name="barcode">
                            </div>
                            <div id="step2" class="form-group hidden">
                                <div class="alert alert-info">
                                    <p>Ingresá el nombre del nuevo producto.</p>
                                </div>

                                <label for="name">Nombre</label>
                                <input type="text" name="name">
                            </div>
                            <div id="step3" class="form-group  hidden">
                                <div class="alert alert-info">
                                    <p>Ingresá el precio del nuevo producto.</p>
                                </div>

                                <label for="barcode">Precio</label>
                                <input type="number" name="precio">
                            </div>
                            <br>
                            <button id='newProdButton' type="submit" class="btn btn-default">Siguiente</button>
                        </form>
                        <div class="hidden" id="newProdDriver">
                            <p class="alert alert-success">Listo</p>
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

    </main>
    <script type="text/javascript" src="<?php echo e(asset('js/new-prod.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>