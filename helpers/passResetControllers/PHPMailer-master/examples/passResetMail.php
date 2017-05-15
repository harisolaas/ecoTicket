<html>
    <head>
        <title>Recupero de contraseña</title>
        <meta charset="utf-8">
        <style media="screen">
            header{
                background-color: #80AA29;
                color: #fff;
                font-family: 'Cabin Condensed', sans-serif;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>ecoTicket</h1>
        </header>
        <p>Hacé click aquí para restablecer tu contraseña:</p>
        <br>
        <p><?php echo $_SESSION['passRecoverURL']; ?></p>
    </body>
</html>
