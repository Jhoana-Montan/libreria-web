<?php

include("conexion.php");

$producto_id = $_POST['producto_id'];
$cantidad = $_POST['cantidad'];

$consulta = $conn->query("
SELECT *
FROM productos
WHERE id = $producto_id
");

if(!$consulta){
    die($conn->error);
}

$producto = $consulta->fetch_assoc();

if(!$producto){
    die("Producto no encontrado.");
}

$stockActual = $producto['stock'];
$precio = $producto['precio'];

if($cantidad > $stockActual){
    die("Stock insuficiente.");
}

$total = $precio * $cantidad;

$conn->query("
INSERT INTO ventas(
    producto_id,
    cantidad,
    precio,
    total
)
VALUES(
    '$producto_id',
    '$cantidad',
    '$precio',
    '$total'
)
") or die($conn->error);

$nuevoStock = $stockActual - $cantidad;

$conn->query("
UPDATE productos
SET stock = $nuevoStock
WHERE id = $producto_id
") or die($conn->error);

header("Location: historial.php");
exit();

?>