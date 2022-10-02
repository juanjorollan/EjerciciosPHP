<?php

require_once('infopaises.php');

$randoms=array_rand($paises,2);
$elegido1=$randoms[0];
$elegido2=$randoms[1];

echo "$randoms[0]<br/>";
foreach($paises[$randoms[0]] as $i){
	print_r($i);
	echo " ";
}
foreach($ciudades[$randoms[0]] as $i){
	print_r($i);
	echo " ";
}
echo "<br/>";
echo "<a href=https://www.google.es/maps/place/$elegido1>$elegido1</a>";
echo "<br/>";
echo "<br/>";
echo "$randoms[1]<br/>";
foreach($paises[$randoms[1]] as $i){
	print_r($i);
	echo " ";
}
foreach($ciudades[$randoms[1]] as $i){
	print_r($i);
	echo " ";
}
echo "<br/>";
echo "<a href=https://www.google.es/maps/place/$elegido2>$elegido2</a>";



?>
