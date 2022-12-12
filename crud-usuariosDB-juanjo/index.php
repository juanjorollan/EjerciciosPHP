<?php
session_start();

include_once 'app/funciones.php';
include_once 'app/acciones.php';

$contenido="";
// Div con contenido
$db = AccesoDatos::getModelo();
$filas = $db->numFilas();

if ( $filas % 10 == 0){
    $fin = $filas-10;
} else {
    $fin = $filas-$filas%10;
}

if ( !isset($_SESSION['inicio']) ){
    $_SESSION['inicio'] = 0;
  }
  $inicio = $_SESSION['inicio'];



if ( isset($_GET['navegacion'])) {

    switch ( $_GET['navegacion']) {
        case "<<"  : $inicio = 0; break;
        case ">": $inicio +=10; if ($inicio > $fin) $inicio=$fin; break;
        case "<" : $inicio -=10; if ($inicio < 0) $inicio =0; break;
        case ">>"   : $inicio = $fin;
    }
}
$_SESSION['inicio'] = $inicio;


if ($_SERVER['REQUEST_METHOD'] == "GET" ){
    
    if ( isset($_GET['orden'])){
        switch ($_GET['orden']) {
            case "Cliente Nuevo": accionAlta(); break;
            case "Borrar"   : accionBorrar   ($_GET['id']); break;
            case "Modificar": accionModificar($_GET['id']); break;
            case "Detalles" : accionDetalles ($_GET['id']);break;
            case "Terminar" : accionTerminar(); break;
        }
    }
} 
// POST Formulario de alta o de modificación
else {
    if (  isset($_POST['orden'])){
         switch($_POST['orden']) {
             case "Cliente Nuevo": accionPostAlta(); break;
             case "Modificar": accionPostModificar(); break;
             case "Detalles":; // No hago nada
         }
    }
}
$contenido= mostrarDatosPag($inicio,10);
include_once "app/layout/principal.php";
