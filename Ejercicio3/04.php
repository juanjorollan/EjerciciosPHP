<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8">
<style>
table,tr,th,td{
	border:1px solid black;
	border-collapse:collapse;
}
</style>
</head>
<body>
<?php

$deportes=array("Futbol"=>"img/futbol.png"
, "Baloncesto"=>"img/baloncesto.png"
, "Esgrima"=>"img/esgrima.png"
, "Natación"=>"img/natacion.png"
, "Boxeo"=>"img/boxeo.png");

echo "<table>";
echo "<tr><th>Deporte</th><th>Logo</th></tr>";
echo "<tr><td>Futbol</td><td><img src=\"$deportes[Futbol]\" height=30px width=30px></td></tr>";
echo "<tr><td>Baloncesto</td><td><img src=\"$deportes[Baloncesto]\" height=30px width=30px></td></tr>";
echo "<tr><td>Esgrima</td><td><img src=\"$deportes[Esgrima]\" height=30px width=30px></td></tr>";
echo "<tr><td>Natación</td><td><img src=\"$deportes[Natación]\" height=30px width=30px></td></tr>";
echo "<tr><td>Boxeo</td><td><img src=\"$deportes[Boxeo]\" height=30px width=30px></td></tr>";
?>
</body>
</html>

