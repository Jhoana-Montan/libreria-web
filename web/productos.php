<?php while($fila = $productos->fetch_assoc()) { ?>

<tr>

<td><?= $fila['id'] ?></td>

<td><?= $fila['nombre'] ?></td>

<td><?= $fila['categoria'] ?></td>

<td>Bs <?= $fila['precio'] ?></td>

<td>

<?php

if($fila['stock']==0){

echo "<span class='agotado'>AGOTADO</span>";

}

elseif($fila['stock']<=10){

echo "<span class='bajo'>{$fila['stock']} (BAJO)</span>";

}

else{

echo $fila['stock'];

}

?>

</td>

<td>

<a class="editar"
href="editar.php?id=<?= $fila['id'] ?>">
Editar
</a>

<a class="eliminar"
href="eliminar.php?id=<?= $fila['id'] ?>">
Eliminar
</a>

</td>

</tr>

<?php } ?>