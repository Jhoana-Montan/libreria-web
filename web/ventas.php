<?php

include("conexion.php");

$productos = $conn->query("
SELECT * FROM productos
WHERE stock > 0
");

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Registrar Venta</title>

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

<div class="formulario">

<h2>Registrar Venta</h2>

<form action="guardar_venta.php" method="POST">

<select name="producto_id" required>

<option value="">
Seleccione producto
</option>

<?php while($producto = $productos->fetch_assoc()) { ?>

<option value="<?= $producto['id'] ?>">

<?= $producto['nombre'] ?>

(Stock: <?= $producto['stock'] ?>)

</option>

<?php } ?>

</select>

<input
type="number"
name="cantidad"
placeholder="Cantidad"
required
min="1"
>

<button>
Registrar Venta
</button>

</form>

</div>

</div>

</body>
</html>