<?php include_once 'app/funciones.php';
$frase=noEtiquetas($_REQUEST['comentario']);
?>
<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= strlen($_REQUEST['comentario']) ?></td></tr>
<tr><td>Nº de palabras:    </td><td><?=str_word_count($frase,0)?></td></tr>
<tr><td>Letra + repetida:  </td><td><?=letraRepetida($frase) ?></td></tr>
<tr><td>Palabra + repetida:</td><td><?=palabraRepetida($frase) ?></td></tr>
</table>
</div>

