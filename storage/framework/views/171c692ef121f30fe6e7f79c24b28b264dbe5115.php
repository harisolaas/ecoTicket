<?php $__env->startSection('title'); ?>
    Nueva categoría
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <main class="container-fluid main">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <ul class="breadcrumb">
                    <li class="active"><a data-toggle="tab" href="#step1">Nombre</a></li>
                    <li><a data-toggle="tab" href="#confirm">Confirmar</a></li>
                </ul>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <form id="pd-builder-form" action="/categories" class="tab-content">
                            <input type="hidden" name="token" value="<?php echo e(csrf_token()); ?>">
                            <div id="step1" class="form-group panel panel-info tab-pane fade in active">
                                <div class="panel-heading">
                                    <p>Ingresá el nombre de la nueva categoría.</p>
                                </div>
                                <div class="panel-body">
                                    <label for="barcode">Nombre</label>
                                    <input type="text" name="name">
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
                                                <td>Nombre</td>
                                                <td>VACÍO</td>
                                                <td><a data-toggle="tab" href="#step1">Modificar...</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-default">Cargar nueva categoría</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="<?php echo e(asset('js/categorie/create.js')); ?>">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>