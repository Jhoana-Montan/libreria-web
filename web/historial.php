<?php

include("conexion.php");

$ventas = $conn->query("
SELECT
v.id,
p.nombre,
v.cantidad,
v.total,
v.fecha
FROM ventas v
INNER JOIN productos p
ON v.producto_id = p.id
ORDER BY v.id DESC
");

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Historial</title>

<link rel="stylesheet" href="css/estilo.css">

</head>

<body>

<div class="sidebar">

<div class="logo">
<h2>Librería Montan</h2>
</div>

<ul>

<li><a href="index.php">Dashboard</a></li>

<li><a href="productos.php">Productos</a></li>

<li><a href="registrar.php">Registrar</a></li>

<li><a href="ventas.php">Ventas</a></li>

<li><a href="historial.php">Historial</a></li>

</ul>

</div>

<div class="main">

<div class="contenedor">

<h2>Historial de Ventas</h2>

<table>

<tr>

<th>ID</th>

<th>Producto</th>

<th>Cantidad</th>

<th>Total</th>

<th>Fecha</th>

</tr>

<?php while($venta = $ventas->fetch_assoc()) { ?>

<tr>

<td><?= $venta['id'] ?></td>

<td><?= $venta['nombre'] ?></td>

<td><?= $venta['cantidad'] ?></td>

<td>Bs <?= $venta['total'] ?></td>

<td><?= $venta['fecha'] ?></td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>