<?php
    require "database.php";
    session_start(); // Si se cumple los parametros iniciamos la sesion
    // Recepcionamos los datos de autenticacion
    include("template/auths/auth.php");

    // Variables

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

<?php include("template/headers/head.php");?>
<!-- Script de la pagina-->
<script type="text/javascript" src="js/admin.js"></script>
</head>

<body>
<!-- Navegador -->
<?php include("template/navs/nav.php");?>

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
<?php include("template/footer.php"); ?>