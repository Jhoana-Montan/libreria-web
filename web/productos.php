<?php

include("conexion.php");

$productos = $conn->query("
SELECT *
FROM productos
ORDER BY id DESC
");

if(!$productos){
    die("Error en la consulta: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Productos | Librería Montan</title>

<link rel="stylesheet" href="css/estilo.css">

</head>

<body>

<div class="container">

<h1>📚 Productos</h1>

<p>
<a href="index.php">🏠 Inicio</a> |
<a href="registrar.php">➕ Registrar Producto</a> |
<a href="ventas.php">🛒 Ventas</a> |
<a href="historial.php">📜 Historial</a>
</p>

<table border="1" cellpadding="10" cellspacing="0" width="100%">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Categoría</th>
<th>Precio</th>
<th>Stock</th>
<th>Acciones</th>
</tr>

<?php while($fila = $productos->fetch_assoc()) { ?>

<tr>

<td><?= $fila['id'] ?></td>

<td><?= $fila['nombre'] ?></td>

<td><?= $fila['categoria'] ?></td>

<td>Bs <?= number_format($fila['precio'],2) ?></td>

<td>

<?php

if($fila['stock']==0){

echo "<span style='color:red;font-weight:bold;'>AGOTADO</span>";

}elseif($fila['stock']<=10){

echo "<span style='color:orange;font-weight:bold;'>{$fila['stock']} (BAJO)</span>";

}else{

echo $fila['stock'];

}

?>

</td>

<td>

<a href="editar.php?id=<?= $fila['id'] ?>">
Editar
</a>

|

<a href="eliminar.php?id=<?= $fila['id'] ?>"
onclick="return confirm('¿Desea eliminar este producto?')">
Eliminar
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>