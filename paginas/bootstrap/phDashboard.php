<?php
session_start();
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta http-equiv="content-type" content="text/html; charset=UTF-8">
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>my-ecoTicket</title>

         <link href="bootstrap.min.css" rel="stylesheet">
         <link rel="stylesheet" href="custom.css">
         <link rel="stylesheet" href="dashboard.css">
         <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed:400,700" rel="stylesheet">
     </head>
     <body cz-shortcut-listen="true">

         <nav class="navbar navbar-default navbar-fixed-top">

             <div class="container">
                 <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sarasa" aria-expanded="false" aria-controls="navbar">
                         <span class="sr-only">Toggle navigation</span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                      </button>
                     <a class="navbar-brand" href="#">ecoTicket</a>
                 </div>

                 <div id="sarasa" class="navbar-collapse collapse">
                   <ul class="nav navbar-nav navbar-right">
                     <li><a href="#about">Sign-in</a></li>
                     <li><a href="#contact">Centro de ayuda</a></li>
                 </div><!--/.nav-collapse -->
             </div>

         </nav>

         <div class="container-fluid">
             <div class="row">

                 <div class="com-md-2 sidebar" style="height:100px;">
                     <ul class="nav nav-sidebar">
                        <li><a href="#">Transacciones</a></li>
                        <li><a href="#">Promos acumuladas</a></li>
                     </ul>
                 </div><!-- .sidebar -->

                 <div class="col-md-10 col-md-offset-2 main" style="height:100px;">
                     <h1 class="page-header">my-ecoTicket</h1>

                     <div class="row">
                         <div class="col-md-12">
                             <form class="">
                                 <input type="text" class="form-control" placeholder="Search...">
                             </form>
                         </div>
                     </div>

                     <div class="">

                     </div>
                 </div><!-- .main -->

             </div><!-- .row -->
         </div><!-- .container-fluid -->


         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
     </body>
 </html>
