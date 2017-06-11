<?php
## esto se implementa con un if que viene del validador, todo en el controler
public function ImageUpload() {
$myFile = dirname(__FILE__);
$myFile = $myFile . "/../images/imgAvatar/";
$fileName = $imgName . "." . $extension;
$myFile = $myFile . $fileName;
move_uploaded_file($_FILES[$upload]["tmp_name"], $myFile);
// CHANGE THIS WHEN USERS AND DATABASE CLASSES ARE DONE
$users[$_POST['email']]['avatar'] = $fileName;
}
