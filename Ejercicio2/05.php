<?php

function generarHTMLTable($filas,$columnas,$borde,$contenido){
echo "<table style=\" border:$borde px solid black; border-collapse:collapse; \">";
for($i=0;$i<$filas;$i++){
echo "<tr style=\" border:$borde' px solid black; border-collapse:collapse;\">";
for($j=0;$j<$columnas;$j++){
echo "<td style=\" border:$borde". "px solid black; border-collapse:collapse; \"> $contenido </td>";
}
echo "<tr>";
}
echo "</table>";
}
generarHTMLTable(3,3,2,"Juanjo");
?>
