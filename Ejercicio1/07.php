<?php

header("Refresh:5");

$rojo=random_int(100,500);
$verde=random_int(100,500);
$azul=random_int(100,500);

echo "<table bgcolor=\"red\" height=\"100\" width=\"".$rojo."\">";
echo "<tr><th>Rojo ( ".$rojo." ) </th></tr>";
echo "</table>";
echo "<table bgcolor=\"green\" height=\"100\" width=\"".$verde."\">";
echo "<tr><th>Verde ( ".$verde." ) </th></tr>";
echo "</table>";
echo "<table bgcolor=\"blue\" height=\"100\" width=\"".$azul."\">";
echo "<tr><th>Azul ( ".$azul." ) </th></tr>";
echo "</table>";
?>
