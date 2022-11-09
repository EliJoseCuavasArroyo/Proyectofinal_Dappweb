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
    $message = "";
    $filter = false;

    // Preparacion de la orden

    if (!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['confirmpassword'])) {

//................................... Filtro por si existen ya usuarios

        $sentenciaSQL = "SELECT * FROM `usuarios`";
        $consulta = $conexion->prepare($sentenciaSQL);
        $consulta->execute(); // Ejecucion de la consulta
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC); // Obtenemos la base de datos

        foreach ($resultados as $usuario){
            if (($usuario['user'] === $_POST['user'])){
                $message = "El usuario ya es existente.";
                $filter = true;
                break;
            }
        }
//........................................

        if(!$filter){
            if ($_POST['password'] === $_POST['confirmpassword']){

                // la orden base es: INSERT INTO `usuarios` (`id`, `user`, `password`) VALUES (NULL, 'again', '1234');
                //$sentenciaSQL = "INSERT INTO usuarios (id, user, password) VALUES (NULL, :user, :password)";
                $sentenciaSQL = "INSERT INTO `usuarios` (`id`, `user`, `password`) VALUES (NULL,  :user, :password);";
    
                $orden = $conexion->prepare($sentenciaSQL);
                $orden->bindParam(':user', $_POST['user']);
                //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                //$orden->bindParam(':password', $password);
                $orden->bindParam(':password', $_POST['password']);

    
                if ($orden->execute()) {
                $message = "Se creo un nuevo usuario exitosamente.";
                } else {
                $message = "Lo sentimos, no se pudo crear el usuario de forma exitosa, intentelo otra vez.";
                }
            }
    
            else{
    
                $message = "La contraseña no se confirmo correctamente, intentelo otra vez.";
            }
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
		<!--<meta name="Eli Jose Cuavas Arroyo" content="DlloAppWeb">-->
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
    <script type="text/javascript" src="js/login.js"></script>

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
            <h1> Code Art Share </h1>
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

        <div class="col-lg-3">
        </div>
    
        <!-- Centro Nota: Recuerda que puedes agregarle encriptado al formulario con los de multipart-data -->

        <div class=col-lg-4>

              <h3>Registrarse:</h3>
              <form name="login" action="registro.php" method="post" enctype="multipart/form-data">
                  <div class="texto">
                    <label>Nombre de usuario:</label><br>
                    <input class="input" type="text" name="user" size="30" required>
                  </div>
                  <div class="texto">
                    <label>Contraseña:</label><br>
                    <input class="input" type="password" name="password" size="30" required>
                  </div>
                  <div class="texto">
                    <label>Confirmar contraseña:</label><br>
                    <input class="input" type="password" name="confirmpassword" size="30" required>
                    <br>
                    <br>
                    <button type="submit" type="button" class="btn btn-dark"><i class="icono-5"></i>Registrarse</button>
                  </div>
                </form>
                <br>

                <!-- Muestra del mensaje-->

                <?php 

                if(!empty($message)){
                    print("<p>".$message."</p>");
                }
                
                ?>

        </div>  
    
        <!-- Aside derecha -->
        <div class=col-lg-5>
            <img src="img/asignatura-de-arte.png" width="300" height="300">
            <br>
            <br>
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