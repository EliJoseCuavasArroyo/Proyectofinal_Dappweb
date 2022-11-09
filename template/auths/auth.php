<?php
if(isset($_SESSION['auth'])){
        if ($_SESSION['user_id'] === $user_id_admin){
            header("Location: admin.php");
        }
        else{
            header("Location: home.php");
        }
    }
?>