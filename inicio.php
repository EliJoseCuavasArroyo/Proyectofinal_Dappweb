<?php
    require "database.php";
    session_start(); // Si se cumple los parametros iniciamos la sesion
    include("template/auths/authsesion.php");
    
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
<?php include("template/footer.php"); ?>