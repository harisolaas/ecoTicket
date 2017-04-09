<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width:device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed:400,700" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/home.css">
    <title>ecoTicket - Home</title>
  </head>
  <body>

      <header class="pantalla-landing">

          <div class="pantalla-landing-titulo">
            <h2>Soluciones digitales a problemas cotidianos<!-- value proposition --></h2>
          </div>

        <nav class="nav-home-container">
              <ul class="botonera">
                  <li><a href="#">ecoTicket</a></li>
                  <li><a href="sign-up.php">Registro</a></li>
                  <li><a href="sign-in.php">Log-in</a></li>
                  <li><a href="faq.php">Centro de ayuda</a></li>
              </ul>
        </nav>
        <nav class="chevron">
          <a href="#propuesta-valor"><span class="icon ion-chevron-down"></span></a>
        </nav>
    </header>


    <div class="contenedor-principal">

        <div class="headerNavContainer">
            <header class="menu">
                <h1>ecoTicket</h1>
                <?php include'../elements/nav.php'; ?>
            </header>
        </div>

      <div id="propuesta-valor" class="propuesta-valor">
        <article class="propuesta-valor-icons">
            <section class="propuesta-valor-section">
                <span class="icon ion-leaf"></span>
                <h2>Ayudá a preservar el planeta</h2>

                <div><p>Miles de toneladas de papel se desperdician todos los días en recibos que pronto terminan en la basura. </p><strong>Cada vez que usas ecoTicket ayudás a reducir el consumo de papel.</strong></div>

            </section>

            <section class="propuesta-valor-section">
                <span class="icon ion-ios-paper"></span>
                <h2>Llevá tus cuentas al día</h2>

                <div><strong>Accedé al registro de todas tus compras desde la plataforma de ecoTicket</strong><p> y organizate como más te guste.</p></div>


            </section>

            <section class="propuesta-valor-section">
                <span class="icon ion-bag"></span>
                <h2>Asegurá tus compras</h2>

                <div><strong>La fidelidad de ecoTicket permite que revises cualquier transacción</strong><p> que hayas realizado en caso de que necesites fundamentar un reclamo.</p></div>
            </section>
        </article>

    </div>

    <?php include '../elements/footer.php'; ?>
    <!-- footer -->

    </div><!-- cierra .contenedor-principal -->
  </body>
</html>
