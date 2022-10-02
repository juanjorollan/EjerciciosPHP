<?php

$n1 =  random_int(1,10);
$n2 =  random_int(1,10);
echo "<table border=\"1 solid black\">";
echo "<tr bgcolor=\"gray\"><th><font color=\"blue\">Operación</font></th><th><font color=\"blue\">Resultado</font></th></tr>";
echo "<tr><th>$n1+$n2</th><th>".$n1+$n2."</th></tr>";
echo "<tr><th>$n1-$n2</th><th>".$n1-$n2."</th></tr>";
echo "<tr><th>$n1*$n2</th><th>".$n1*$n2."</th></tr>";
echo "<tr><th>$n1/$n2</th><th>".$n1/$n2."</th></tr>";
echo "<tr><th>$n1%$n2</th><th>".$n1%$n2."</th></tr>";
echo "<tr><th>$n1**$n2</th><th>".$n1**$n2."</th></tr>";
?>
