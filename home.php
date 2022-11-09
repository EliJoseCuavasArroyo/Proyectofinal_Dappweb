<?php
    require "database.php";
    session_start();

    // Recepcionamos los datos de autenticacion

    if(isset($_SESSION['auth'])){
        if ($_SESSION['user_id'] === $user_id_admin){
            header("Location: admin.php");
        }
        $user = $_SESSION['user'];
    }
    else{
        header("Location: inicio.php");
    }

    // Programamos las diferentes acciones del usuario

    if (isset($_POST['accion'])){

        switch ($_POST['accion']){
            case "agregar":
                if (isset($_FILES['arch']['name'])) {
                    $img = $_FILES['arch']['name'];
                }
                else{
                    $img = "error404.jpg";
                }
            
                $name = $_POST['name'];
                $pos = "NINGUNA";
            
                //Preparamos la orden
                // la orden base es: INSERT INTO `data` (`id`, `name`, `img`, `user`, `pos`) VALUES (NULL, 'prueba1', 'hola.png', 'Chris45Z', '0');
                $sentenciaSQL = "INSERT INTO `data` (`id`, `name`, `img`, `user`, `pos`) VALUES (NULL, :name, :img, :user, :pos);";
                $orden = $conexion->prepare($sentenciaSQL);


                // Guardamos el archivo en una careta de imagenes
                $fecha = new DateTime();

                $name_img = $fecha->getTimestamp().$img;
                $tmp_img = $_FILES['arch']['tmp_name'];

                if (!empty($tmp_img)){
                    move_uploaded_file($tmp_img, "img/".$name_img);
                }

                // Continuamos con la orden

                $orden->bindParam(':user', $user);
                $orden->bindParam(':img', $name_img);
                $orden->bindParam(':name', $name);
                $orden->bindParam(':pos', $pos);
        
                $orden->execute();

                break;
            case "borrar":
                // Recuperamos el id a eliminar
                $id_delete = $_POST['id_delete'];

                // Hacemos una consulta del nombre del archivo para borrar

                $sentenciaSQL = "SELECT img FROM data WHERE id = :id";
                $consulta = $conexion->prepare($sentenciaSQL);
                $consulta->bindParam(':id', $id_delete);
                $consulta->execute();
                $resultado = $consulta->fetch(PDO::FETCH_LAZY); // Con esta orden buscamos simplemente una fila especifica.

                // Eliminamos el arhivo de la carpeta de imagenes
                if (isset($resultado['img'])){
                    if (file_exists("img/".$resultado['img'])){
                        unlink("img/".$resultado['img']);
                    }
                }

                // Eliminamos el archivo de la base de datos
                $sentenciaSQL = "DELETE FROM data WHERE `data`.`id` = :id";
                $orden = $conexion->prepare($sentenciaSQL);
                $orden->bindParam(':id', $id_delete);
                $orden->execute();

                break;
            default:
                break;
        }
    }

    // Nos preparamos para mostrar los datos del usuario

    $sentenciaSQL = "SELECT * FROM `data`";
    $consulta = $conexion->prepare($sentenciaSQL);
    $consulta->execute(); // Ejecucion de la consulta
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC); // Obtenemos la base de datos
    $resultados_user = array(); // Hacemos una lista de las imagenes del usuario

    foreach ($resultados as $imagen){
        if ($imagen['user'] === $user){
            array_push($resultados_user, $imagen);
        } 
    }

?>

<?php include("template/headers/head.php");?>
</head>

<body>
<!-- Navegador -->
<?php include("template/navs/nav_sesion.php");?>

<!-- Contenido principal de la pagina -->

<div class="content">
<br>
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-1">
        </div>
    
        <!-- Centro -->

        <div class=col-lg-3>

            <h3>Ingresar nueva imagen:</h3>
            <form action="home.php" method="post" enctype="multipart/form-data">
                <div class="texto">
                <label>Nombre de la imagen: </label><br>
                <input class="input" type="text" name="name" size="30" required>
                </div>
                <br>
                <div class="texto">
                <label>Suba la imagen:</label><br>
                <input class="input" type="file" name="arch" size="30" required>
                <br>
                <br>
                <button type="submit" type="button" name="accion" value="agregar" class="btn btn-success">Agregar </button>
                </div>
            </form>
            <br><br><br><br>
        </div>  
    
        <div class=col-lg-7>
            <h3> Mi galeria personal: </h3>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            if (!empty($resultados_user)) {
                                foreach ($resultados_user as $imagen_user){
                                    print("<tr>");
                                    print("<td>".$imagen_user['name']."</td>");
                                    print("<td> <img src='img/".$imagen_user['img']."' width='100%' height='100%'> </td>");
                                    print("<td>");
                                    print("<form action='home.php' method='post'>");
                                    print("<div class='texto'>");
                                    print("<input class='input' type='hidden' value=".$imagen_user['id']." name='id_delete'>");
                                    print("<button type='submit' type='button' name='accion' value='borrar' class='btn btn-danger'> Borrar </button>");
                                    print(" </div>");
                                    print("</form>");
                                    print("</td>");
                                    print("</tr>");
                                }
                            }
                        ?>
                    </tbody>
                </table>
        </div>

        <div class=col-lg-1></div>

    </div>
</div>

<!-- Pie de pagina -->
<?php include("template/footer.php"); ?>