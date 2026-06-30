<?php

include("conexion.php");

$id = $_POST['id'];

$nombre = $_POST['nombre'];

$categoria = $_POST['categoria'];

$precio = $_POST['precio'];

$stock = $_POST['stock'];

$conn->query("
UPDATE productos
SET
nombre='$nombre',
categoria='$categoria',
precio='$precio',
stock='$stock'
WHERE id=$id
");

header("Location: productos.php");

?>