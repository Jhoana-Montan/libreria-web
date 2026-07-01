<?php

include("conexion.php");

$id = $_GET['id'];

// Eliminar primero las ventas relacionadas
$conn->query("
DELETE FROM ventas
WHERE producto_id = $id
");

// Luego eliminar el producto
$conn->query("
DELETE FROM productos
WHERE id = $id
");

header("Location: productos.php");

?>