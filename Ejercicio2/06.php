<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<code>
<?php
$num = random_int(1, 10);
echo "$num";
echo "<br/>";
for ($i=0;$i<3;$i++) {
    if ($i==2){
        for ($j=0;$j<$num-1;$j++) {
            echo "*****";
        }
        echo "****";
    } else {
        for ($g=0;$g<$num;$g++) {
            echo "**** ";
        }
    }
    echo "<br/>";
}
?>
</code>
</body>
</html>
