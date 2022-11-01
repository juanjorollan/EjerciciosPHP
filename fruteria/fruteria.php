<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria</title>
</head>
<body>
    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD']=="GET" && empty($_GET['nombre'])) {
        include 'inicio.html';
    }
    if (($_SERVER['REQUEST_METHOD']=="GET" && !empty($_GET['nombre']))) {
        $_SESSION['nombre']=$_GET['nombre'];
        include 'pedido.php';
    }
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        if ($_POST['accion']=='Anotar') {
            if (empty($_SESSION['lista'][$_POST['fruta']])) {
                $_SESSION['lista'][$_POST['fruta']]=$_POST['cantidad'];
            } else {
                $_SESSION['lista'][$_POST['fruta']]+=$_POST['cantidad'];
            }
            include 'listafruta.php';
            include 'pedido.php';
        } else{
            include 'listafruta.php';
            include 'terminar.php';
        }
    }
    ?>
</body>
</html>