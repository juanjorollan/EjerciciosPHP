<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria</title>
</head>
<body>
    <p>Este es su pedido: </p>
    <table style="border: 1px solid black">
        <?php
        if (!empty($_SESSION['lista'])) {
            foreach ($_SESSION['lista'] as $key => $value) {
                echo "</tr><td><b> $key</b>  $value </td></tr>";
            }
        } else {
            echo "La lista está vacía";
        }
        ?>
    </table>
</body>
