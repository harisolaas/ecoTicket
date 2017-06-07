<?php
session_start();

$titulo = 'Registro';

@$errorFirstName = $_SESSION['errors']['errorFirstName'];
@$errorPass = $_SESSION['errors']['errorPass'];
@$errormail= $_SESSION['errors']['errormail'];
@$errorLastName= $_SESSION['errors']['errorLastName'];

@$firstName = $_SESSION['firstName'];
@$lastName = $_SESSION['lastName'];
@$mail = $_SESSION['mail'];

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width:device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/sign-in-up-forms.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <title>ecoTicket :: Registro</title>
  </head>
  <body>
    <div class="main-container">

        <?php include'../elements/nav.php'; ?>

      <div class="form-container">

        <form action="../helpers/sign-up.controller.php" enctype="multipart/form-data" method="post">

          <div class="form-element">
            <div>
              <label for="mail">Correo electrónico</label><br>
              <input type="text" name="mail" required placeholder="correo@electronico.com" value="<?php
              if(isset($mail)){
                  echo $mail;
              }

              ?>">
              <br>
              <p class='error'><?php echo $errormail; ?></p>
            </div>
          </div>
          <!-- mail -->

          <div class="form-element">

            <div class="form-name-lastname">
              <div>
                <label for="name">Nombre</label><br>
                <input type="text" name="name" required placeholder="Tu nombre" value="<?php // PERSISTENCIA DE DATOS
                if(isset($firstName)){
                echo $firstName;
            } ?>">
            <p class='error'><?php echo $errorFirstName; ?></p>
              </div>

              <div class="">
                <label for="lastName">Apellido</label><br>
                <input type="text" name="lastName" required placeholder="Tu apellido" value="<?php // PERSISTENCIA DE DATOS
                if(isset($lastName)){
                echo $lastName;
            } ?>">
            <p class='error'><?php echo $errorLastName; ?></p>
              </div>

            </div>

          </div>
          <!-- name -->

          <div class="form-element">
            <div>
              <label for="pass">Contraseña</label><br>
              <input type="password" name="pass" required placeholder="Tu contraseña">
          <p class='error'><?php echo $errorPass; ?></p>
            </div>
          </div>
          <!-- pass -->

          <div class="form-element">
            <div>
              <label for="confirmPass">Confirmar contraseña</label><br>
              <input type="password" name="confirmPass" required placeholder="Tu contraseña otra vez">
          <p class='error'><?php echo $errorPass; ?></p>

            </div>
          </div>
          <!-- confirm pass -->

          <div>
            <label for="avatar">Avatar</label> <br>
            <input type="file" name="avatar" id="avatar">
          </div>
          <!-- Avatar -->

          <div class="form-element">
            <input class='button' type="submit" name="submit" value="Enviar">
          </div>
          <!-- button -->

        </form>

      </div> <!-- Cierra .form-container -->

      <div class="span"></div>

    </div><!-- Cierra .main-container -->

    <?php include '../elements/footer.php';
        unset($_SESSION['errors']);
    ?>


  </body>
</html>
