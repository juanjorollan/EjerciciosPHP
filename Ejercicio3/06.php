<?php

require_once('infopaises.php');
$mayor=0;
$pais="";
foreach($paises as $i => $j){
if($j["Poblacion"]>$mayor){
$mayor=$j["Poblacion"];
$pais=$i;
}
}

echo "<b>El país con más población es $pais</b>";
echo "<br/>";
echo "<b>Las ciudades de este país son: </b>";
echo "<br/>";

foreach($ciudades[$pais] as $i){
echo $i;
echo "<br/>";
}
?>
