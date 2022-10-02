<html>
	<head>
		<style>
		table,td{
			border:1px solid black;
		}
		
		td{
		height:30px;
		width:30px;
		}
		
		#titulo{
		    background-color:blue;
		    margin-right:1140px;
		}
		
		h1{
		color:white;
		text-align:center;
		}
		</style>
	</head>
	<body>
		<div id=titulo>
		<h1>Tablero de colores</h1>
		</div>
		<?php
			$num1=random_int(0,255);
			$num2=random_int(0,255);
			$num3=random_int(0,255);
			
			function degradar(&$num1,&$num2,&$num3){
			$num1+=3;
			$num2+=3;
			$num3+=3;
			$color="rgb($num1,$num2,$num3)";
			return $color;
			}
			?>
		<table>
			<?php
			for($i=0;$i<10;$i++){
			echo "<tr>";
				for($j=0;$j<10;$j++){
				$poner=degradar($num1,$num2,$num3);
				echo "<td style=\"background-color:$poner\"></td>";
				}
			echo "</tr>";
			}
			?>
		</table>
	</body>
</html>
