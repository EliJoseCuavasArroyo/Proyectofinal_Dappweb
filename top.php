<?php
    require "database.php";
    session_start();

    // Recepcionamos los datos de autenticacion
    
    include("template/auths/authsesion.php");

    // Nos preparamos para mostrar los datos

    $sentenciaSQL = "SELECT * FROM `data`";
    $consulta = $conexion->prepare($sentenciaSQL);
    $consulta->execute(); // Ejecucion de la consulta
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC); // Obtenemos la base de datos
    $resultados_top = array(); // Hacemos una lista de las imagenes del Top

    foreach ($resultados as $imagen){
        if ($imagen['pos'] === "SI"){
            array_push($resultados_top, $imagen);
        } 
    }

?>

<?php include("template/headers/head.php");?>
</head>

<body>
<?php include("template/navs/nav_auth.php");?>

<!-- Contenido principal de la pagina -->

<div class="content">
<br>
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-1">
        </div>
    
        <!-- Centro -->

        <div class=col-lg-10>
            <p>Este es el top de imágenes elegidas por los administradores, si la tuya esta presente, felicitaciones y gracias por formar parte de nuestra comunidad...</p>
            <div class="row">
                <?php foreach ($resultados_top as $imagen_top){ ?>
                <div class=col-md-3> 
                <div class="card bg-dark">
                <?php print("<img class='card-img-top' src='img/".$imagen_top['img']."' alt='Card image'>");?>
                <div class="card-body">
                    <h5 class="card-title"><?php print($imagen_top['name']);?></h5>
                    <p class="card-text">Usuario: <?php print($imagen_top['user']);?></p>
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
<?php include("template/footer.php"); ?>