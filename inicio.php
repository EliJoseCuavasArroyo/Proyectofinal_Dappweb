<?php
    require "database.php";

    session_start(); // Si se cumple los parametros iniciamos la sesion

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
        <!-- 

           <h3>Iniciar de sesion:</h3>
            <form action="../action_page.php" target="_blank">
                <div class="texto">
                  <label>Correo:</label><br>
                  <input class="input" type="text" name="Email" size="20" required>
                </div>
                <div class="texto">
                  <label>Contraseña:</label><br>
                  <input class="input" type="password" name="Password" size="20" required>
                  <br>
                  <br>
                  <button type="submit" type="button" class="btn btn-dark"><i class="icono-5"></i>Login</button>
                </div>
              </form>

              <br><br>

              <h3>Registro:</h3>
              <form action="../action_page.php" target="_blank">
                  <div class="texto">
                    <label>Nombre de usuario:</label><br>
                    <input class="input" type="text" name="Name" size="20" required>
                  </div>
                  <div class="texto">
                    <label>Correo:</label><br>
                    <input class="input" type="text" name="Email" size="20" required>
                  </div>
                  <div class="texto">
                    <label>Contraseña:</label><br>
                    <input class="input" type="password" name="Password" size="20" required>
                    <br>
                    <br>
                    <button type="submit" type="button" class="btn btn-dark"><i class="icono-5"></i>Login</button>
                  </div>
                </form>

                <br><br>
            -->

        </div>
    
        <!-- Centro -->

        <div class=col-lg-8>
            <h1>Bienvenido a Code Art Share</h1>
                <p>Code Art Share es una pagina web que quiere motivar a las personas de toda Colombia a compartir sus más queridas imágenes o obras de artes de forma virtual con una comunidad que disfruta de ver y observar los diferentes estilos y gustos sobre cualquier tipo de arte, sea nuevo o antiguo, de la edad media o contemporáneo, aquí queremos que tengas un espacio en el cual puedas compartir también todo tipo de tus gustos, todo desde la base del respeto y la comprensión.</p>
            <h3>¿Quiénes somos?</h3>
                <p>Somos un grupo de estudiantes de la universidad de Antioquia de la facultad de ingeniería electrónica y telecomunicaciones, que con la intención de mejorar nuestras habilidades en el manejo y desarrollo de páginas webs, desarrollamos una página web completa desde el localhost usando bases de datos de phpmyadmin junto con los lenguajes de programación html, css, php y javascript.</p>
        </div>  
    
        <!-- Aside derecha -->

        <div class=col-lg-3>
            <h3> Conoce más: </h3>
            <ul>
                <li><a href="https://www.yuumeiart.com/"> YuumeiArt. </a></li><br>
                <li><a href="https://www.artstation.com/?sort_by=community"> ArtStation.
                </a></li><br>
                <li><a href="https://www.artstation.com/wlop"> WLOP.
                </a></li><br>
                <li><a href="https://www.artstation.com/nixeu"> N I X E U.
                </a></li><br>
                <li><a href="https://www.zerochan.net/">Zerochan.
                </a></li><br>
                <li><a href="https://wall.alphacoders.com/"> Alphacoders.
                </a></li><br>
                <li><a href="https://www.wallpaper.com/"> Wallpapers.
                </a></li><br>
                <li><a href="https://www.udea.edu.co/wps/portal/udea/web/inicio/!ut/p/z1/hY7LDoIwEEW_xQVbOrSg4K5BYkDCIzERuzFgasEAJYDw-zbqxsTH7O7ccyaDGMoQa_OpEvlYyTavVT6y5SlKLc_ALoSxTzxInchKyNbH5oqgwz-AqRq-DAXlswdiOy42qAkh7AwLaOol0T52k02AX8CPGwFiopbF813aFsQWiPX8wnve67derctx7Ia1BhrM86wLKUXN9bNsNPiklHIYUfZOoq7J4GrVU0gXizthmbDl/dz/d5/L2dBISEvZ0FBIS9nQSEh/"> UdeA.
                </a></li>
            </ul>
            <a href="https://www.cicerocomunicacion.es/los-mejores-sitios-para-subir-imagenes-gratis/"><h4>Más información...</h4></a>
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