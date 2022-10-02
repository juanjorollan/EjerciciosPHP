<?php

$numeros=array();
echo"<table style=\"border:1px solid black;border-collapse:collapse\"> <tr>";
for($i=0;$i<20;$i++){
$numeros[$i]=random_int(1,10);
echo "<td style=\"border:1px solid black;border-collapse:collapse\">$numeros[$i]</td>";
}
echo "</tr></table>";
$max=maxNum($numeros);
echo "<br/>";
echo "Mayor: $max";
$min=minNum($numeros);
echo "<br/>";
echo "Menor: $min";
$media=media($numeros);
echo "<br/>";
echo "Media: $media";


function maxNum($numeros){
$mayor=0;
for($i=0;$i<20;$i++){
if($numeros[$i]>$mayor){
$mayor=$numeros[$i];
}
}
return $mayor;
}
function minNum($numeros){
$menor=10;
for($i=0;$i<20;$i++){
if($numeros[$i]<$menor){
$menor=$numeros[$i];
}
}
return $menor;
}
function media($numeros){
$media=0;
for($i=0;$i<20;$i++){
$media+=$numeros[$i];
}
$media/=20;
return $media;
}
?>
