<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ecoTicket :: <?php echo $__env->yieldContent('title'); ?></title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href=<?php echo e(asset("css/custom.css")); ?>>
        <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed:400,700" rel="stylesheet">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php echo $__env->yieldContent('head'); ?>
    </head>
    <body>
        <?php $__env->startSection('nav'); ?>
            <?php echo $__env->make('_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldSection(); ?>

        <div class="main">
            <?php echo $__env->yieldContent('main'); ?>
        </div>

        <?php $__env->startSection('footer'); ?>
            <?php echo $__env->make('_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldSection(); ?>

        <?php $__env->startSection('scripts'); ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <?php echo $__env->yieldSection(); ?>

    </body>
</html>
