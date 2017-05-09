<?php

openUsers();

$errorFirstName = '';
$errorLastName= '';
$errorPass = '';
$errorEmail= '';


// VALIDACION NAME < 30 caracteres
$firstName = trim($_POST["name"]);
if(strlen($firstName) > 30){
    $errorFirstName = 'El nombre es demasiado largo';
}

// VALIDACION LAST NAME
$lastName = trim($_POST["lastName"]);
if(strlen($lastName) > 30){
    $errorLastName = 'El apellido es demasiado largo';
}

// VALIDACION PASSWORD vs CONFIRM_PASSWORD
$pass = $_POST['pass'];
$confirmPass = $_POST['confirm-pass'];
if(isset($_POST['pass']) && isset($_POST['confirm-pass'])){
    if($_POST['pass'] !== $_POST['confirm-pass']){
        $errorPass = 'Los Passwords no coinciden';


// VALIDACION LONGITUD DEL PASSWORD + de 6 caracteres
    } elseif(strlen($_POST['pass']) < 6){
        $errorPass = 'Debes ingresar un Passsword de al menos 6 caracteres';
    }  elseif (strlen($_POST['pass']) >= 12) {
        $errorPass = 'Debes ingresar un Password de hasta 12 caracteres';
    }

    //VALIDACION PASSWORD EXITOSA

    else {
        $errorPass = '';
    }
}

    //VALIDACION EMAIL
    $email = trim($_POST['email']);
    $validateEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

    if($validateEmail === false){
        $errorEmail = 'Por favor ingresar un Email valido';
    }
    elseif(isUserSet()){
    $errorEmail = 'Este email ya esta registrado';
}
    else { $errorEmail = '';
    }

    // Avatar-------

      function guardarImagen($upload, $nombreImagen) {
      $error = '';
      if ($_FILES[$upload]["error"] == UPLOAD_ERR_OK) {
        $nombre = $_FILES[$upload]["name"];
        $ext = pathinfo($nombre, PATHINFO_EXTENSION);

        // Validation of img
        if ($ext !== "png" && $ext !== "jpg") {
          $error = "Introduzca un archivo png o jpg (forro)";
        } else {
          $miArchivo = dirname(__FILE__);
          $miArchivo = $miArchivo . "../../elements/imgAvatar/";
          $miArchivo = $miArchivo . $nombreImagen . "." . $ext;
          move_uploaded_file($_FILES[$upload]["tmp_name"], $miArchivo);
        }

      // Limit File Size.
        if ($_FILES[$upload]["size"] > 800000) {
        echo "Supera la capacidad de carga";
        $uploadOk = 0;
    }
      } else {
        $error = "Archivo no pudo subirse";
      }
      return $error;
    }


    $errorAvatar = guardarImagen('avatar', $email);


 ?>
