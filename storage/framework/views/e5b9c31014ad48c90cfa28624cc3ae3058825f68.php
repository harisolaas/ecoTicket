<?php $__env->startSection('title'); ?>
    Nuevo ecoTicket
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <main class="container main">
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <form class="" action="" method="post">
                                    <input type="text" name="barcode" placeholder="Código de barras...">
                                </form>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>