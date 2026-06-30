<?php

include("conexion.php");

$producto_id = $_POST['producto_id'];

$cantidad = $_POST['cantidad'];

$consulta = $conn->query("
SELECT *
FROM productos
WHERE id = $producto_id
");

$producto = $consulta->fetch_assoc();

$stockActual = $producto['stock'];

if($cantidad > $stockActual){

die("Stock insuficiente");

}

$total = $producto['precio'] * $cantidad;

$conn->query("
INSERT INTO ventas(
producto_id,
cantidad,
total
)
VALUES(
'$producto_id',
'$cantidad',
'$total'
)
");

$nuevoStock = $stockActual - $cantidad;

$conn->query("
UPDATE productos
SET stock = $nuevoStock
WHERE id = $producto_id
");

header("Location: historial.php");

?>