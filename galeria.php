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
<?php include("template/footer.php"); ?>