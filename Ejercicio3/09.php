<html>
	<head>
		<style>
		table,th,tr,td{
			border:1px solid black;
			border-collapse:collapse;
		}
		body{
			background:lightblue;
		}
		</style>
	</head>
	<body>
<?php
$temperaturas =  [ 6, 10, 12, 14,16 ,20 ,25 , 30, 18, 15, 14, 8];
$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
$mestemperatura=array();
for($i=0;$i<12;$i++){
$mestemperatura[$meses[$i]]=$temperaturas[$i];
}
echo "<table>";
foreach($mestemperatura as $i=>$j){
echo "<tr><td>$i</td><td>";
for($k=0;$k<$j;$k++){
echo "<img src=\"img/verde.png\" width=10px height=10px>";
}
echo "$j ºC</td></tr>";
}
echo "</table>";
?>
</body>
</html>
