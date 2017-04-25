<?php
session_start();

$titulo = 'Registro';

$errorFirstName = $_SESSION['errorFirstName'];
$errorPass = $_SESSION['errorPass'];
$errorEmail= $_SESSION['errorEmail'];
$errorLastName= $_SESSION['errorLastName'];

$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$email = $_SESSION['email'];

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

        <form action="../elements/sign-up-controller.php" enctype="multipart/form-data" method="post">

          <div class="form-element">
            <div>
              <label for="email">Correo electrónico</label><br>
              <input type="text" name="email" required placeholder="correo@electronico.com" value="<?php
              if(isset($email)){
                  echo $email;
              }

              ?>">
              <?php echo $errorEmail; ?>
            </div>
          </div>
          <!-- email -->

          <div class="form-element">

            <div class="form-name-lastname">
              <div>
                <label for="first-name">Nombre</label><br>
                <input type="text" name="first-name" required placeholder="Tu nombre" value="<?php // PERSISTENCIA DE DATOS
                if(isset($firstName)){
                echo $firstName;
            } ?>">
            <?php echo $errorFirstName; ?>
              </div>

              <div class="">
                <label for="last-name">Apellido</label><br>
                <input type="text" name="last-name" required placeholder="Tu apellido" value="<?php // PERSISTENCIA DE DATOS
                if(isset($lastName)){
                echo $lastName;
            } ?>">
            <?php echo $errorLastName; ?>
              </div>

            </div>

          </div>
          <!-- name -->

          <div class="form-element">
            <div>
              <label for="pass">Contraseña</label><br>
              <input type="password" name="pass" required placeholder="Tu contraseña">
          <?php echo $errorPass; ?>
            </div>
          </div>
          <!-- pass -->

          <div class="form-element">
            <div>
              <label for="confirm-pass">Confirmar contraseña</label><br>
              <input type="password" name="confirm-pass" required placeholder="Tu contraseña otra vez">
          <?php echo $errorPass; ?>

            </div>
          </div>
          <!-- confirm pass -->

          <!--Avatar  -->

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


    </div><!-- Cierra .main-container -->

    <?php include '../elements/footer.php'; ?>


  </body>
</html>
