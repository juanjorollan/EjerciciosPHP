<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8">
<style>
table,tr,th,td{
	border:1px solid black;
	border-collapse:collapse;
	color:blue;
}
</style>
</head>
<body>
<?php

$numeros=array();

echo "<table><tr>";


for($i=0;$i<6;$i++){
$num=random_int(1,49);
if(in_array($num,$numeros)==false){
array_push($numeros,$num);
sort($numeros);
}else{
$i--;
}
}

for($i=0;$i<6;$i++){
if($i==5){
echo "<td>Complementario $numeros[$i]</td>";
}else{
echo "<td>$numeros[$i]</td>";
}

}

echo "</tr></table>"


?>
</body>
</html>
