<?php

include("conexion.php");

$id = $_GET['id'];

$sql = $conn->query("SELECT * FROM productos WHERE id=$id");

$producto = $sql->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar</title>
<link rel="stylesheet" href="css/estilo.css">
</head>

<body>

<div class="formulario">

<h2>Editar Producto</h2>

<form action="actualizar.php" method="POST">

<input
type="hidden"
name="id"
value="<?= $producto['id'] ?>"
>

<input
type="text"
name="nombre"
value="<?= $producto['nombre'] ?>"
required
>

<input
type="text"
name="categoria"
value="<?= $producto['categoria'] ?>"
required
>

<input
type="number"
step="0.01"
name="precio"
value="<?= $producto['precio'] ?>"
required
>

<input
type="number"
name="stock"
value="<?= $producto['stock'] ?>"
required
>

<button>
Actualizar
</button>

</form>

</div>

</body>
</html>