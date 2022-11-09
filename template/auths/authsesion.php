<?php
    // Recepcionamos los datos de autenticacion

    if(isset($_SESSION['auth'])){
        if ($_SESSION['user_id'] === $user_id_admin){
            $text1 = "Administrador";
            $text2 = "admin.php";
        }
        else{
            $text1 = $_SESSION['user'];
            $text2 = "home.php";
        }
    }
    else{
        $text1 = "Ingresa";
        $text2 = "ingresa.php";
    }
?>