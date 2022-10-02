<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet" type="text/css"/>
 </head>
 <body>
  <div id="azul">
  	<h1>TABLA DE MULTIPLICAR</h1>
  </div>
  <div id="blanco">
  	<table>
	<?php
	$num=random_int(1,10);
	$contador=1;
	?>
	<tr><th>Tabla del <?=$num?></th><th></th></th>
	<?php
	while($contador<11){
	echo "<tr><td>$num * $contador= </td><td>".($num*$contador)."</td></tr>";
	echo "<br>";
	$contador++;
	}
	?>
   </table>
  </div>
 </body>
 </html>
