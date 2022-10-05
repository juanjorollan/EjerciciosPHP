<?php

define ('uno',  "&#9856;");
define ('dos',  "&#9857;");
define ('tres',  "&#9858;");
define ('cuatro',    "&#9859;" );
define ('cinco',    "&#9860;" );
define ('seis',    "&#9861;" );

$jugador1=Array(random_int(1,6),random_int(1,6),random_int(1,6),random_int(1,6),random_int(1,6));
$jugador2=Array(random_int(1,6),random_int(1,6),random_int(1,6),random_int(1,6),random_int(1,6));
$resultado1=puntos($jugador1);
$resultado2=puntos($jugador2);

echo "<h1>Cinco dados</h1><br/>";
echo "Actualice la página para mostrar una nueva tirada<br/>";
echo "</br>";
echo "<b>JUGADOR 1&nbsp&nbsp";
for($i=0;$i<6-1;$i++){
echo "<span style=\"font-size: 50px\">".iconos($jugador1[$i])."</span>";
}
echo "&nbsp&nbsp&nbsp$resultado1 puntos";
echo "</br>";
echo "</b>";
echo "<b>JUGADOR 2&nbsp&nbsp";
for($i=0;$i<6-1;$i++){
echo "<span style=\"font-size: 50px\">".iconos($jugador2[$i])."</span>";
}
echo "&nbsp&nbsp&nbsp$resultado2 puntos";
echo "</b>";
echo "<br/>";
jugar($resultado1,$resultado2);



function iconos($num){
if($num==1){
 return uno;
}else if($num==2){
 return dos;
}else if($num==3){
 return tres;
}else if($num==4){
 return cuatro;
}else if($num==5){
 return cinco;
}else if($num==6){
 return seis;
}
}

function puntos($jug){
$mayor=0;
$menor=7;
$result1=0;
$borrado1=false;
$borrado2=false;

for($i=0;$i<5;$i++){
if($jug[$i]>$mayor){
$mayor=$jug[$i];
}
}

for($i=0;$i<5;$i++){
if($mayor==$jug[$i] && $borrado1==false){
unset($jug[$i]);
$borrado1=true;
}
}

$jug=array_values($jug);

for($i=0;$i<4;$i++){
if($jug[$i]<$menor){
$menor=$jug[$i];
}
}

for($i=0;$i<4;$i++){
if($menor==$jug[$i] && $borrado2==false){
unset($jug[$i]);
$borrado2=true;
}
}

$jug=array_values($jug);

for($i=0;$i<sizeof($jug);$i++){
$result1+=$jug[$i];
}

return $result1;

}

function jugar($result1,$result2){

if($result1>$result2){
echo "Ha ganado el jugador 1";
}else if($result2>$result1){
echo "Ha ganado el jugador 2";
}else{
echo "Ha habido un empate";
}


}

?>
