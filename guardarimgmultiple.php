<html>
<head>
<title>Procesa una subida de archivos </title>
<meta charset="UTF-8">
</head>
<?php
// se incluyen esta tabla de  códigos de error que produce la subida de archivos en PHPP
// Posibles errores de subida segun el manual de PHP
$codigosErrorSubida= [ 
    UPLOAD_ERR_OK         => 'Subida correcta',  // Valor 0
    UPLOAD_ERR_INI_SIZE   => 'El tamaño del archivo excede el admitido por el servidor',  // directiva upload_max_filesize en php.ini
    UPLOAD_ERR_FORM_SIZE  => 'El tamaño del archivo excede el admitido por el cliente',  // directiva MAX_FILE_SIZE en el formulario HTML
    UPLOAD_ERR_PARTIAL    => 'El archivo no se pudo subir completamente',
    UPLOAD_ERR_NO_FILE    => 'No se seleccionó ningún archivo para ser subido',
    UPLOAD_ERR_NO_TMP_DIR => 'No existe un directorio temporal donde subir el archivo',
    UPLOAD_ERR_CANT_WRITE => 'No se pudo guardar el archivo en disco',  // permisos
    UPLOAD_ERR_EXTENSION  => 'Una extensión PHP evito la subida del archivo',  // extensión PHP

]; 
$mensaje = '';

$kilobytes=0;

if (count($_POST) == 0 ){
   $mensaje= "  Error: se supera el tamaño máximo de un petición POST ";
   }else{
    for($i=0;$i<count($_FILES['archivos']['name']);$i++){
        $tamaño=$_FILES['archivos']['size'][$i];
        $tipo=$_FILES['archivos']['type'][$i];
        $nombre=$_FILES['archivos']['name'][$i];
        $error=$_FILES['archivos']['error'][$i];

        if($error==2 || $tamaño+$kilobytes>300000){
            $mensaje="Error: se ha superado el tamaño máximo de un fichero";
        }
        else if($tipo!="image/jpeg" && $tipo!="image/png"){
            $mensaje="Error: el formato de los ficheros debe ser PNG o JPG";
        }else if(file_exists("/imguser"."/".$nombre)){
            $mensaje="Error: Duplicado";
        }else if($error>0){
            $mensaje="Error ".$codigosErrorSubida[$error];
        }
        else if(is_dir("/imguser") && is_writable("/imguser")){
            if(move_uploaded_file($_FILES['archivos']['tmp_name'][$i],"/imguser"."/".$nombre)==true){
                $mensaje="Archivo añadido";
                $kilobytes+=$tamaño;
            }else{
                $mensaje="Error subiendo el archivo";
            }
        }else{
            $mensaje="Error con el directorio de guardado";
        }

        
    }
    
   }
?>
<body>
<?= $mensaje; ?>
<br />
	<a href="subirfichero.html">Volver a la página de subida</a>
</body>
</html>