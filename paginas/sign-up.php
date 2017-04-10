<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width:device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/sign-in-up-forms.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <title>ecoTicket - Registro</title>
  </head>
  <body>
    <div class="main-container">

        <div class="headerNavContainer">
            <header class="menu">
                <h1>Registro</h1>
                <?php include '../elements/nav.php'; ?>
            </header>
        </div>

      <div class="form-container">

        <form action="#.php" method="post">

          <div class="form-element">
            <div>
              <label for="email">Correo electrónico</label><br>
              <input type="email" name="email" required placeholder="correo@electronico.com">
            </div>
          </div>
          <!-- email -->

          <div class="form-element">

            <div class="form-name-lastname">
              <div>
                <label for="first-name">Nombre</label><br>
                <input type="text" name="first-name" required placeholder="Tu nombre">
              </div>

              <div class="">
                <label for="last-name">Apellido</label><br>
                <input type="text" name="last-name" required placeholder="Tu apellido">
              </div>

            </div>

          </div>
          <!-- name -->

          <div class="form-element">
            <div>
              <label for="password">Contraseña</label><br>
              <input type="password" name="password" required placeholder="Tu contraseña">
            </div>
          </div>
          <!-- pass -->

          <div class="form-element">
            <div>
              <label for="confirm-password">Confirmar contraseña</label><br>
              <input type="password" name="confirm-password" required placeholder="Tu contraseña otra vez">
            </div>
          </div>
          <!-- confirm pass -->

          <div class="form-element">
            <button type="submit">Enviar</button>
          </div>
          <!-- button -->

        </form>

      </div> <!-- Cierra .form-container -->


    </div><!-- Cierra .main-container -->

    <?php include '../elements/footer.php'; ?>

  </body>
</html>