<?php

openUsers('../');

$errorFirstName = '';
$errorLastName= '';
$errorPass = '';
$errormail= '';


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
$confirmPass = $_POST['confirmPass'];
if(isset($_POST['pass']) && isset($_POST['confirmPass'])){
    if($_POST['pass'] !== $_POST['confirmPass']){
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

    //VALIDACION mail
    $mail = trim($_POST['mail']);
    $validatemail = filter_var($mail, FILTER_VALIDATE_mail);

    if($validatemail === false){
        $errormail = 'Por favor ingresar un mail valido';
    }
    elseif(isUserSet()){
    $errormail = 'Este mail ya esta registrado';
}
    else { $errormail = '';
    }

    // Avatar-------


    function saveImage($upload, $nombreImagen) {
        global $errorFile;
        global $users;
    	if ($_FILES[$upload]["error"] == UPLOAD_ERR_OK) {

    		$nombre = $_FILES[$upload]["name"];
    		$ext = pathinfo($nombre, PATHINFO_EXTENSION);

    		if ($ext != "png" && $ext != "jpg") {
    			$errorFile = "No acepto la extension";
    		} else {
    			$miArchivo = dirname(__FILE__);
    			$miArchivo = $miArchivo . "/../images/imgAvatar/";
                $fileName = $nombreImagen . "." . $ext;
    			$miArchivo = $miArchivo . $fileName;
    			move_uploaded_file($_FILES[$upload]["tmp_name"], $miArchivo);
                $users[$_POST['mail']]['avatar'] = $fileName;
    		}
    	} else {
    		$errorFile = "Ey, no pude subir la foto :(";
    	}
    	return $errorFile;
    }
 ?>
