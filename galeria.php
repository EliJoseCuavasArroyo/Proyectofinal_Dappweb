<?php
    require "database.php";

    session_start();

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

    // Nos preparamos para mostrar los datos

    $sentenciaSQL = "SELECT * FROM `data`";

    $consulta = $conexion->prepare($sentenciaSQL);

    $consulta->execute(); // Ejecucion de la consulta

    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC); // Obtenemos la base de datos

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
                        <li class="nav-item"><a class="nav-link text-white" href=<?php print($text2);?>><strong><?php print($text1);?></strong></a></li>
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

        <div class="col-lg-1">
        </div>
    
        <!-- Centro -->

        <div class=col-lg-10>
            <p>Bienvenido a la galería de la comunidad...</p>
            <div class="row">
                <?php foreach ($resultados as $imagen){ ?>
                <div class=col-md-3> 
                <div class="card bg-dark">
                <?php print("<img class='card-img-top' src='img/".$imagen['img']."' alt='Card image'>");?>
                <div class="card-body">
                    <h5 class="card-title"><?php print($imagen['name']);?></h5>
                    <p class="card-text">Usuario: <?php print($imagen['user']);?></p>
                </div>
                </div>
                </div>

                <?php } ?>
            </div>

            <br><br><br><br>
        </div>  
    
        <!-- Aside derecha -->
        <div class=col-lg-1>
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