<?php

$anterior=0;
$anterior2=0;
$condicion=false;
$contador=0;

while($condicion==false){
$num=random_int(1,10);
if($num==6 && $anterior==6 && $anterior2==6){
$condicion=true;
}
if($contador>=1){
$anterior2=$anterior;
}
$anterior=$num;
$contador++;
}

echo "Han salido tres 6 seguidos tras generar ".$contador." en ".microtime(true);

?>
