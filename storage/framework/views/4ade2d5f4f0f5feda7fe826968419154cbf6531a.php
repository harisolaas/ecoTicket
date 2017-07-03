<?php $__env->startSection('title'); ?>
    Productos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <main class="container-fluid main">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Mis productos</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Marca</th>
                            <th>Editar/Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($product->name); ?></td>
                                <td><?php echo e($product->price); ?></td>
                                <td><?php echo e($product->brand->name); ?></td>
                                <td>
                                    <a class="btn btn-default" href="/products/<?php echo e($id); ?>/edit">Editar</a>
                                    <a class="btn btn-default" href="/products/<?php echo e($id); ?>/delete">Borrar</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>