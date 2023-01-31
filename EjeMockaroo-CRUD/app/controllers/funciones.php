<?php
require_once __DIR__."/../mpdf/vendor/autoload.php";

function lugarIP($ip){

    $ipapi="http://ip-api.com/json/$ip";
    $resultado=file_get_contents($ipapi);
    $arrayresultado=json_decode($resultado,true);
    
    if (array_key_exists("countryCode",$arrayresultado)) {
        return $arrayresultado['countryCode'];
    }
}

function fotoUser($id){
    $nombreFoto="";
    $digitos=strlen($id);
    $ceros=8-$digitos;
    for($i=0;$i<$ceros;$i++){
        $nombreFoto.="0";
    }
    $nombreFoto.=$id.".jpg";

    if(file_exists("app/uploads/".$nombreFoto)){
        return "http://localhost/dashboard/EjeMockaroo-CRUD/app/uploads/".$nombreFoto;
    }else{
        return "https://robohash.org/".$id;
    }

}

function pdf($cli) {
    $id = $cli["id"];
    $nombre = $cli["first_name"];
    $apellido = $cli["last_name"];
    $email = $cli["email"];
    $genero = $cli["gender"];
    $ip = $cli["ip_address"];
    $tel = $cli["telefono"];
    $foto = fotoUser($id);

    $html .= "<div>";
    $html .= "<center><h2>Usuario nº " . $id."</h2></center>";
    $html .= "<table>";
    $html .= "<tr><td rowspan=\"6\"><img src=\"".$foto."\"></td><th>Nombre</th><td>".$nombre."</td></tr>";
    $html .= "<tr><th>Apellidos</th><td>".$apellido."</td></tr>";
    $html .= "<tr><th>Email</th><td>".$email."</td></tr>";
    $html .= "<tr><th>Genero</th><td>".$genero."</td></tr>";
    $html .= "<tr><th>IP</th><td>".$ip."</td></tr>";
    $html .= "<tr><th>Telefono</th><td>".$tel."</td></tr>";
    $html .= "</table></div>";

    return $html;
}
function subirImagen($fichero, $id) {
    $nombreFoto="";
    $digitos=strlen($id);
    $ceros=8-$digitos;
    for($i=0;$i<$ceros;$i++){
        $nombreFoto.="0";
    }

    $nombreFoto.=$id.".jpg";
    $temp = $fichero["archivo"]["tmp_name"];
    $peso = $fichero["archivo"]["size"];
    if (is_dir("app/uploads") && is_writable("app/uploads")) {
        if (file_exists("app/uploads/".$nombreFoto) && $peso != 0) {
            unlink("app/uploads/".$nombreFoto);
        }
        move_uploaded_file($temp,"app/uploads/".$nombreFoto);
    }
}

function comprobarFichero($fichero) {
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
    $nombre = $fichero["archivo"]["name"];
    $peso = $fichero["archivo"]["size"];
    $tipo = $fichero["archivo"]["type"];
    $error = $fichero["archivo"]["error"];

    

    if ($peso == 0) {
        if ($tipo == "" && $nombre != "") {
            return "Fichero nulo";
        } else {
            return true;   
        }
    }

    if ($error > 0) {
        return $codigosErrorSubida[$error];
    } else if ($peso > 1000000) {
        return "El tamaño del fichero no puede superar 1MB";
    } else if ($tipo != "image/jpeg") {
        return "El formato de la imagen debe ser JPG";
    } 
    return true;
}

?>