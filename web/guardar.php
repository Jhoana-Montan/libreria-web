<?php

include("conexion.php");

$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

$sql = "INSERT INTO productos(nombre,categoria,precio,stock)
VALUES('$nombre','$categoria','$precio','$stock')";

$conn->query($sql);

header("Location: productos.php");

?>