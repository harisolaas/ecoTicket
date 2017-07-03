<?php $__env->startSection('title'); ?>
    ecoTicket :: Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
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
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>

                    </table>

                </div>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>