<?php
    require "database.php";

    session_start(); // Si se cumple los parametros iniciamos la sesion

    // Recepcionamos los datos de autenticacion

    if(isset($_SESSION['auth'])){
        if ($_SESSION['user_id'] === $user_id_admin){
            header("Location: admin.php");
        }
        else{
            header("Location: home.php");
        }
    }

    // Varaibles

    $message1 = "";
    $message2 = "";
    $auth = false;
    $usuario_admin = "admin";
    $password_admin = "admin";

    // Preparacion de una consulta

    if (isset($_POST['modo'])){
        switch ($_POST['modo']){
            case "simple":
                if (!empty($_POST['user']) && !empty($_POST['password'])) {

                    // la orden base es: SELECT * FROM `usuarios`
            
                    $sentenciaSQL = "SELECT * FROM `usuarios`";
            
                    $consulta = $conexion->prepare($sentenciaSQL);
            
                    $consulta->execute(); // Ejecucion de la consulta
            
                    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC); // Obtenemos la base de datos
            
                    foreach ($resultados as $usuario){
                        if (($usuario['user'] === $_POST['user']) && ($usuario['password'] === $_POST['password'])){
                            $_SESSION['user_id'] = $results['id'];
                            $_SESSION['user'] = $_POST['user'];
                            $_SESSION['auth'] = true;
                            header("Location: home.php");
                            break;
                        } else {
                            $message1 = "El usuario o la contraseña fueron ingresados de manera incorrecta.";
                        }
                    }
            
                }
                break;

            case "admin":
                if (!empty($_POST['user']) && !empty($_POST['password'])) {
                    if (($usuario_admin === $_POST['user']) && ($password_admin === $_POST['password'])){
                        session_start(); // Si se cumple los parametros iniciamos la sesion de aministrador
                        $_SESSION['user_id'] = $user_id_admin;
                        $_SESSION['user'] = $usuario_admin;
                        $_SESSION['auth'] = true;
                        header("Location: admin.php");
                    } else {
                        $message2 = "El usuario o la contraseña fueron ingresados de manera incorrecta.";
                    }
                }
                break;
            default:
                break;
        }
    }

?>

<!DOCTYPE html>
<html lang="es" manifest="data.appache">

	<head>
		<title>Proyecto final</title>
        <link rel="icon" type="image/png" href="img/artes.png">
		<!-- Metainformacion -->
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Eli Jose Cuavas Arroyo" content="DlloAppWeb">
		<meta name="keywords" content="html frontend web programacion">
		<meta name="Proyecto final" content="UdeAWeb">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        
        <!-- css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"><link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <!-- extras -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <!-- Script de la pagina-->
    <script type="text/javascript" src="js/admin.js"></script>

	</head>
<body>

<!-- Navegador -->
<header class="row text-white">
    
        <!-- Imagen del icono -->
        <div class="col-lg-2">
            <img src="img/Code_Art_Online.png" width="180" height="180">
        </div>
    
        <!-- Infomacion del navegador -->
        <div class="col-lg-10">
            <br>
            <h1> Code Art Share</h1>
            <h6>"Comparte tu arte con el mundo"</h6>
            <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link text-white" href="inicio.php"><strong>Inicio</strong></a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="ingresa.php"><strong>Ingresa</strong></a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="galeria.php"><strong>Galeria</strong></a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="top.php"><strong>Top</strong></a></li>
                    </ul>
            </nav>
        </div>
</header>

<!-- Contenido principal de la pagina -->

<div class="content">
<br>
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-2">
        </div>
    
        <!-- Centro -->

        <div class=col-lg-5>

            <h3>Iniciar de sesion:</h3>
            <form name="login" action="ingresa.php" method="post" enctype="multipart/form-data">
                <div class="texto">
                <label>Usuario:</label><br>
                <input class="input" type="text" name="user" size="30" required>
                </div>
                <div class="texto">
                <label>Contraseña:</label><br>
                <input class="input" type="password" name="password" size="30" required>
                <br>
                <br>
                <button type="submit" type="button" name="modo" value="simple" class="btn btn-dark">Login</button>
                </div>
            </form>
            <br>
            <!-- Muestra del mensaje-->
            <?php 
                if(!empty($message1)){
                    print("<p>".$message1."</p>");
                }
                ?>
            <p>No estas registrado? Registrate <a href="registro.php">aqui</a> </p>

        </div>  
    
        <!-- Aside derecha -->
        <div class=col-lg-5>
            <img src="img/asignatura-de-arte.png" width="300" height="300">     
        </div>

    </div>

    <br><br>

    <div class="row">

        <div class="col-lg-2">
        </div>
    
        <!-- Centro -->

        <div class=col-lg-5>

            <h3>Iniciar de sesion como administrador:</h3>
            
            <form name="admin" action="ingresa.php" method="post" enctype="multipart/form-data">
                <div class="texto">
                <label>Usuario de administrador:</label><br>
                <input class="input" type="text" name="user" size="30" required>
                </div>
                <div class="texto">
                <label>Contraseña:</label><br>
                <input class="input" type="password" name="password" size="30" required>
                <br>
                <br>
                <button type="submit" type="button" name="modo" value="admin" class="btn btn-dark">Login</button>
                </div>
            </form>
            <br>
            <!-- Muestra del mensaje-->
            <?php 
            if(!empty($message2)){
                print("<p>".$message2."</p>");
            }
            ?>

        </div>  
    
        <!-- Aside derecha -->
        <div class=col-lg-5>
            <img src="img/watercolor1.png"> 
        </div>

    </div>
</div>

<!-- Pie de pagina -->
<footer>
    <section>
        <p><b>Creador de la pagina:</b> Eli Jose Cuavas Arroyo</p>
        <p><b>Telefono:</b> 3225612400</p>
        <p><b>Correo:</b> eli.cuavas@udea.edu.co</p>
        <p><b>TIP:</b> 1007675766</p>
    <div>Iconos diseñados por <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.es/" title="Flaticon">www.flaticon.es</a></div>
</footer>

</div>

</body>

</html>