<?php
require_once 'interface.Validable.php'
 class ImageValidator implements Validable{

     //VALIDATE AVATAR FILE
     public function validate($data, $repo) {
            $errors = [];

         if ($_FILES[$upload]["error"] == UPLOAD_ERR_OK) {

             $name = $_FILES[$upload]["name"];
             $extension = pathinfo($name, PATHINFO_EXTENSION);

             if ($extension != "png" && $extension != "jpg") {
                 $errors[] = "No acepto la extension";
<<<<<<< Updated upstream:helpers/classes/user/class.ImageValidator.php
             } else {
                 $myFile = dirname(__FILE__);
                 $myFile = $myFile . "/../images/imgAvatar/";
                 $fileName = $imgName . "." . $extension;
                 $myFile = $myFile . $fileName;
                 move_uploaded_file($_FILES[$upload]["tmp_name"], $myFile);
                 // CHANGE THIS WHEN USERS AND DATABASE CLASSES ARE DONE
                 $users[$_POST['mail']]['avatar'] = $fileName;
=======
>>>>>>> Stashed changes:helpers/classes/class.ImageValidator.php
             }
         } else {
             $errors[] = "Ey, no pude subir la foto :(";
         } return $errors;
 }
