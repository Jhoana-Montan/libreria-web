<?php

include("conexion.php");

$productos = $conn->query("
SELECT *
FROM productos
WHERE stock > 0
ORDER BY nombre ASC
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

<title>Registrar Venta</title>

<link rel="stylesheet" href="css/estilo.css">

</head>

<body>

<div class="sidebar">

<div class="logo">
<h2>📚 Librería Montan</h2>
</div>

<ul>

<li><a href="index.php">🏠 Dashboard</a></li>

<li><a href="productos.php">📦 Productos</a></li>

<li><a href="registrar.php">➕ Registrar</a></li>

<li><a href="ventas.php">🛒 Ventas</a></li>

<li><a href="historial.php">📜 Historial</a></li>

</ul>

</div>

<div class="main">

<div class="formulario">

<h2>Registrar Venta</h2>

<form action="guardar_venta.php" method="POST">

<label>Producto</label>

<select name="producto_id" required>

<option value="">Seleccione un producto</option>

<?php while($producto = $productos->fetch_assoc()) { ?>

<option value="<?= $producto['id'] ?>">

<?= $producto['nombre'] ?>

- Bs <?= number_format($producto['precio'],2) ?>

(Stock: <?= $producto['stock'] ?>)

</option>

<?php } ?>

</select>

<br><br>

<label>Cantidad</label>

<input
type="number"
name="cantidad"
min="1"
required
placeholder="Cantidad">

<br><br>

<button type="submit">
Registrar Venta
</button>

</form>

</div>

</div>

</body>

</html>