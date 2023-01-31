<form>
<button type="submit" name="orden" value="Nuevo" <?= isset($btnrol1)?$btnrol1:'' ?>> Cliente Nuevo </button><br>
</form>
<br>
<?= isset($msg)?$msg:'' ?>
<table>
<tr><th>id</th><th>first_name </th><th>email</th>
<th>gender</th><th>ip_address</th><th>teléfono</th></tr>
<?php foreach ($tvalores as $valor): ?>
<tr>
<td><?= $valor->id ?> </td>
<td><?= $valor->first_name ?> </td>
<td><?= $valor->email ?> </td>
<td><?= $valor->gender ?> </td>
<td><?= $valor->ip_address ?> </td>
<td><?= $valor->telefono ?> </td>
<td><a href="#" onclick="confirmarBorrar('<?=$valor->first_name?>',<?=$valor->id?>);" >Borrar</a></td>
<td><a href="?orden=Modificar&id=<?=$valor->id?>">Modificar</a></td>
<td><a href="?orden=Detalles&id=<?=$valor->id?>" >Detalles</a></td>

<tr>
<?php endforeach ?>
</table>

<form>
<br>
<p>Ordenar por:
<button type="submit" name="ordenar" value="id">id</button>
<button type="submit" name="ordenar" value="first_name">nombre</button>
<button type="submit" name="ordenar" value="email">email</button>
<button type="submit" name="ordenar" value="gender">género</button>
<button type="submit" name="ordenar" value="ip_address">ip</button>
<button type="submit" name="ordenar" value="telefono">teléfono</button>
</p>
<button type="submit" name="nav" value="Primero"> << </button>
<button type="submit" name="nav" value="Anterior"> < </button>
<button type="submit" name="nav" value="Siguiente"> > </button>
<button type="submit" name="nav" value="Ultimo"> >> </button>
</form>
