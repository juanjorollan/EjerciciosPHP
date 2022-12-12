<?php
include_once "Usuario.php";

function accionBorrar ($id){    
    $db = AccesoDatos::getModelo();
    $tcliente = $db->borrarUsuario($id);
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}
 
function accionAlta(){
    $cliente = new Usuario();
    $cliente->id ="";
    $cliente->first_name ="";
    $cliente->email ="";
    $cliente->gender =""; 
    $cliente->ip_address ="";
    $cliente->telefono  ="";
    $orden= "Cliente Nuevo";
    include_once "layout/formulario.php";
}

function accionDetalles($id){
    $db = AccesoDatos::getModelo();
    $cliente = $db->getUsuario($id);
    $orden = "Detalles";
    include_once "layout/formulario.php";
}


function accionModificar($id){
    $db = AccesoDatos::getModelo();
    $cliente = $db->getUsuario($id);
    $orden="Modificar";
    include_once "layout/formulario.php";
}

function accionPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cliente = new Usuario();
    $cliente->id = $_POST[ 'id'];
    $cliente->first_name = $_POST['first_name'];
    $cliente->email = $_POST['email'];
    $cliente->gender = $_POST['gender'];
    $cliente->ip_address = $_POST['ip_address'];
    $cliente->telefono = $_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $db->addUsuario($cliente);
    
}

function accionPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cliente = new Usuario();
    $cliente->id = $_POST['id'];
    $cliente->first_name = $_POST['first_name'];
    $cliente->email = $_POST['email'];
    $cliente->gender = $_POST['gender'];
    $cliente->ip_address = $_POST['ip_address'];
    $cliente->telefono = $_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $db->modUsuario($cliente);
    
}