<?php
include 'ConexionBD/Conexion.php';
$resultado = $conexion -> query ("SELECT * FROM productos WHERE Existencia_L > 0") or die ($conexion -> error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nutripulp </title>
    <script src="https://kit.fontawesome.com/2c4007a4a1.js" crossorigin="anonymous"></script> <!--IconosRedes-->
    <link rel="icon" href="Img/Logo.png">
    <link rel="stylesheet" href="General.css">
    <link rel="stylesheet" href="MenuPulpas.css">
</head>
<body>
<header> 
    <img id="Logo" src="Img/Logo.png" width="250px" height="165px"> 
    <form action="Busqueda.php" method="GET">
        <input id="busqueda" type="search" placeholder="Buscar" name="busqueda">
    </form>
        <nav>
            <a href="">Yos Valpuesta</a>
            <a href="">Mis compras</a>
            <a href="MenuPulpas.php">Menú</a>
            <a href="Carrito/Carrito.php"><img src="Img/Carrito.png" alt="" width="40px" height="40px"></a>
        </nav>
</header>

    <h1>Pulpas de Fruta</h1>
    <?php
        while ($mostrar = mysqli_fetch_array($resultado)) { 
    ?>
        <div class = "galeria" >
            <div class = "foto">
                <img width="130px" height="90px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>">
            </div>
            <div class = "datos">
                <p>1Lt <?php echo $mostrar["Nombre"]; ?></p>
                <p>$<?php echo number_format($mostrar["Precio"], 2, '.', ''); ?></p>
                <form class="boton1" action="VistaProducto.php?id=<?php echo $mostrar['id']; ?>" method="POST" enctype="multipart/form-data">
                    <input class="boton" type="submit" value="Ver producto" name="btnVer">
                </form>
            </div>
        </div>
    <?php
        } 
    ?>

    <footer>
        <div class="grupo1">
            <div class="box">
                <center><h2>Contacto</h2></center>
                <p>Whatsapp: 5575625202
                   Telefono: 55 5603 3859</p>
                <p>Email: ventas@nutripulp.com</p>
            </div>
            <div class="box">
                <h2>SIGUENOS EN REDES</h2>
                <div class="redes">
                    <a href="https://www.facebook.com/nutripulpmx" target="_blank" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/nutripulp/" target="_blank" class="fa fa-instagram"></a>
                    <a href="https://twitter.com/NutriPulp" target="_blank" class="fa fa-twitter"></a>
                </div>
            </div>
        </div>
        <div class="grupo2">
            <small>&copy; 2022 <b>Nutripulp</b> -Todos los Derechos Reservados.</small>
        </div>
    </footer>
</body>
</html>