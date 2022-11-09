<?php
    require "database.php";
    session_start(); // Si se cumple los parametros iniciamos la sesion
    // Recepcionamos los datos de autenticacion
    include("template/auths/auth.php");

    $message = "";
    $filter = false;

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
                $sentenciaSQL = "INSERT INTO `usuarios` (`id`, `user`, `password`) VALUES (NULL,  :user, :password);";
                $orden = $conexion->prepare($sentenciaSQL);
                $orden->bindParam(':user', $_POST['user']);
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

<?php include("template/headers/head.php");?>
<!-- Script de la pagina-->
<script type="text/javascript" src="js/login.js"></script>
</head>

<body>
<!-- Navegador -->
<?php include("template/navs/nav.php");?>

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
<?php include("template/footer.php"); ?>