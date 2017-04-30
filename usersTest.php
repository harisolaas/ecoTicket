<?php
include('helpers/users.library.php');
openUsers();
deleteUser('hari_2500@hotmail.com');
// if (isset($_POST['email'])) {
//     setUserEmail($_POST['newEmail'], $_POST['email']);
// }else{
//     setUserEmail($_POST['newEmail']);
// }
// setUserFullName($_POST['newEmail'], $_POST['name'], $_POST['lastName']);
//
// setUserPassword($_POST['newEmail'], $_POST['pass']);

updateUsers();

 ?>
 <!-- <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>usersTest</title>
     </head>
     <body>
         <form action="" method="post">

             <label for="email">Email</label><br>
             <input type="email" name="email"><br><br>

             <label for="newEmail">New Email</label><br>
             <input type="email" name="newEmail"><br><br>

             <label for="name">Nombre</label><br>
             <input type="text" name="name"><br><br>

             <label for="lastName">Apellido</label><br>
             <input type="text" name="lastName"><br><br>

            <label for="pass">Password</label><br>
             <input type="password" name="pass"><br><br>

             <input type="submit" name="" value="Enviar">

         </form>
     </body>
 </html> -->
