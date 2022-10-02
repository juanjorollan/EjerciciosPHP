<html>
	<head>
		<style>
		table,th,tr,td{
			border:1px solid black;
			border-collapse:collapse;
		}
		td{
		color:blue;
		}
		</style>
	</head>
	<body>
<?php

require_once('infopaises.php');
$mayor=0;
$pais="";
$todasciudad=array();
echo "<table><tr><th>Pais</th><th>Capital</th><th>Poblacion</th><th>Ciudades</th></tr>";
foreach($paises as $i => $j){
$pais=$i;
echo "<tr><td>$pais</td><td>$j[Capital]</td><td>$j[Poblacion]</td>";
echo "<td>";
foreach($ciudades[$pais] as $k){
echo $k." ";
}

echo "</td>";
echo"</tr>";
}
echo "</table>";

?>
</body>
</html>
