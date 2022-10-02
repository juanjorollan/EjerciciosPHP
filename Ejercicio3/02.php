<?php

$periodicos=array("ElMundo"=>"https://www.elmundo.es/"
, "ElPais"=>"https://elpais.com/"
, "MARCA"=>"https://www.marca.com/"
, "ABC"=>"https://www.abc.es/"
, "LaVanguardia"=>"https://www.lavanguardia.com/");

echo "<ul>
  	<a href = $periodicos[ElMundo]> <li>El Mundo</li></a>
  	<a href = $periodicos[ElPais]> <li>El País</li></a>
  	<a href = $periodicos[MARCA]> <li>MARCA</li></a>
  	<a href = $periodicos[ABC]> <li>ABC</li></a>
  	<a href = $periodicos[LaVanguardia]> <li>La Vanguardia</li></a>
      </ul>";
?>
