<?php

require_once "app/controllers/funciones.php";

function crudBorrar ($id){    
    $db = AccesoDatos::getModelo();
    
    if($_SESSION['rol']==0){
        $msg="No tienes permisos";
        $tvalores=$db->getClientes($_SESSION['posini'],FPAG);
        include_once "app/views/list.php";
    }else{
        $tuser = $db->borrarCliente($id);
    }
}

function crudTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}
 
function crudAlta(){
    $db = AccesoDatos::getModelo();
    $cli = new Cliente();
    $btn="disabled";
    if($_SESSION['rol']==0){
        $msg="No tienes permisos";
        $tvalores=$db->getClientes($_SESSION['posini'],FPAG);
        include_once "app/views/list.php";
    }else{
        $orden= "Nuevo";
        include_once "app/views/formulario.php";
    }
}

function crudDetalles($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $codigopais=lugarIP($cli->ip_address);
    $bandera="http://flagcdn.com/256x192/".strtolower($codigopais).".png";
    $foto=fotoUser($cli->id);
    include_once "app/views/detalles.php";
}

function crudDetallesSiguiente($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id+1);
    if(isset($cli)){
    $codigopais=lugarIP($cli->ip_address);
    $bandera="http://flagcdn.com/256x192/".strtolower($codigopais).".png";
    $foto=fotoUser($cli->id);
    include_once "app/views/detalles.php";
    }else{
        $cli = $db->getCliente($id);
        $codigopais=lugarIP($cli->ip_address);
        $bandera="http://flagcdn.com/256x192/".strtolower($codigopais).".png";
        $foto=fotoUser($cli->id);
        include_once "app/views/detalles.php";
    }
    
}

function crudDetallesAnterior($id){
    $db = AccesoDatos::getModelo();
    if($id-1!=0){
        $cli = $db->getCliente($id-1);
        $codigopais=lugarIP($cli->ip_address);
        $bandera="http://flagcdn.com/256x192/".strtolower($codigopais).".png";
        $foto=fotoUser($cli->id);
        include_once "app/views/detalles.php";
    }else{
        $cli = $db->getCliente($id);
        $codigopais=lugarIP($cli->ip_address);
        $bandera="http://flagcdn.com/256x192/".strtolower($codigopais).".png";
        $foto=fotoUser($cli->id);
        include_once "app/views/detalles.php";
    }
    
}

function crudModificar($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    
    if($_SESSION['rol']==0){
        $msg="No tienes permisos";
        $tvalores=$db->getClientes($_SESSION['posini'],FPAG);
        include_once "app/views/list.php";
    }else{
        $orden="Modificar";
        include_once "app/views/formulario.php";
    }
    
}
function crudModificarSiguiente($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id+1);
    if(isset($cli)){
    $orden="Modificar";
    include_once "app/views/formulario.php";
    }else{
        $cli = $db->getCliente($id);
        $orden="Modificar";
        include_once "app/views/formulario.php";
    }
}

function crudModificarAnterior($id){
    $db = AccesoDatos::getModelo();
    if($id-1!=0){
        $cli = $db->getCliente($id-1);
        $orden="Modificar";
        include_once "app/views/formulario.php";
        }else{
            $cli = $db->getCliente($id);
            $orden="Modificar";
            include_once "app/views/formulario.php";
        }
}

function crudPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();
    $cli->id            =$_POST['id'];
    $cli->first_name    =$_POST['first_name'];
    $cli->last_name     =$_POST['last_name'];
    $cli->email         =$_POST['email'];	
    $cli->gender        =$_POST['gender'];
    $cli->ip_address    =$_POST['ip_address'];
    $cli->telefono      =$_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $imagen = comprobarFichero($_FILES);
    if($db->repetido($_POST['email'])){
        $msg="Email repetido";
        $orden="Nuevo";
        require_once "app/views/formulario.php";
    }else if(!formatoIP($_POST['ip_address'])){
        $msg="FORMATO INCORRECTO EN IP";
        $orden="Nuevo";
        require_once "app/views/formulario.php";
    }else if(!formatoTelefono($_POST['telefono'])){
        $msg="FORMATO INCORRECTO EN TELÉFONO";
        $orden="Nuevo";
        require_once "app/views/formulario.php";
    }else if (!is_bool($imagen)) {
        $msg = $imagen;
        $orden = "Nuevo";
        $btn = "disabled";
        $foto = fotoUser($cli->id);
        include_once "app/views/formulario.php";
    } else {
        
        $db->addCliente($cli);
        $idcrear=$db->repetidoMod($cli->email);
        subirImagen($_FILES,$idcrear->id);
    }
}

function crudPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();

    $cli->id            =$_POST['id'];
    $cli->first_name    =$_POST['first_name'];
    $cli->last_name     =$_POST['last_name'];
    $cli->email         =$_POST['email'];	
    $cli->gender        =$_POST['gender'];
    $cli->ip_address    =$_POST['ip_address'];
    $cli->telefono      =$_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $imagen = comprobarFichero($_FILES);
    $cli2=$db->repetidoMod($cli->email);
    if($cli->id!=$cli2->id){
        $msg="Email repetido";
        $orden="Modificar";
        require_once "app/views/formulario.php";
    }else if(!formatoIP($_POST['ip_address'])){
        $msg="FORMATO INCORRECTO EN IP";
        $orden="Modificar";
        require_once "app/views/formulario.php";
    }else if(!formatoTelefono($_POST['telefono'])){
        $msg="FORMATO INCORRECTO EN TELÉFONO";
        $orden="Modificar";
        require_once "app/views/formulario.php";
    }else if (!is_bool($imagen)) {
        $msg = $imagen;
        $orden = "Modificar";
        $foto = fotoUser($cli->id);
        require_once "app/views/formulario.php";
    } else {
        subirImagen($_FILES, $cli->id);
        $db->modCliente($cli);
    }
}

function inicio(){
    if(!isset($_SESSION['contador'])){
        $_SESSION['contador']=0;
    }
    $db = AccesoDatos::getModelo();
    $user2=$db->comprobarInicio($_POST['nombre'],$_POST['passw']);

    if( $_SESSION['contador']<3){
        if(isset($user2)){
            $_SESSION['nombrelog']=$user2->nombre;

            if(!isset($_SESSION['rol'])){
                $_SESSION['rol']=$user2->rol;
            }
        }else{
            $_SESSION['contador']+=1;
            require_once "app/views/iniciar.php";
        }
    }else{
        $msg="Numero de intentos superados, reinicie el navegador";
        require_once "app/views/iniciar.php";
    }
    
}

function formatoIP($ip){
$formato="/^((25[0-5]|(2[0-4]|1\d|[1-9]|)\d)\.?\b){4}$/";
if(preg_match_all($formato, $ip)){
    return true;
}else{
    return false;
}
}
function formatoTelefono($telefono){
    $formato="/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4}$/";
    if(preg_match_all($formato, $telefono)){
        return true;
    }else{
        return false;
    }
}
function crudImprimir($cli) {
    $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/../uploads']);
    $pdf = pdf($cli);
    $mpdf->WriteHTML($pdf);
    $mpdf->Output();
}