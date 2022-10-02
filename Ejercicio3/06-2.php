<?php

require_once('infopaises.php');
ksort($paises);
echo "Ordenado por nombre el último es: <br/>";
print_r(array_key_last($paises));
?>
