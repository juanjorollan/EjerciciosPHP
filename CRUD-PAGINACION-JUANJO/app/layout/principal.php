<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CRUD DE USUARIOS</title>
<link href="web/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="web/js/funciones.js"></script>
</head>
<body>
<div id="container" >
<div id="header">
<h1>GESTIÓN DE USUARIOS versión 1.1 + BD</h1>
</div>
<div id="content">
<form>
<input type="submit" name="orden" value="Cliente Nuevo">
</form>
<br>
<?= $contenido ?>
<form>
<br>
<input type="submit" name="navegacion" value="<<">
<input type="submit" name="navegacion" value=">">
<input type="submit" name="navegacion" value="<">
<input type="submit" name="navegacion" value=">>">
</form>
</div>
</div>
</body>