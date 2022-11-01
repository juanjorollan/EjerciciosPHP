<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruteria</title>
</head>
<body>
    <?php
    $usuario=$_SESSION['nombre'];
    ?>
    <h1>La Frutería del siglo XXI</h1>
    <h3>REALICE SU COMPRA <?php echo strtoupper($usuario) ?></h3>
    <form action="fruteria.php" method="POST">
        <label><b>Seleccione la fruta:</b>
            <select name="fruta" required>
                <option disabled selected value> -- Selecciona una fruta -- </option>
                <option value="Naranjas">Naranjas</option>
                <option value="Limones">Limones</option>
                <option value="Platanos">Platanos</option>
                <option value="Manzanas">Manzanas</option>
            </select>
        </label>
        <label><b>Cantidad: </b><input name="cantidad" value="0" type="number" required></label>
        <input type="submit" value="Anotar" name="accion">
        <input type="submit" value="Terminar" name="accion">
    </form>
</body>
</html>