<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registrar Producto</title>
<link rel="stylesheet" href="css/estilo.css">
</head>

<body>

<header>

<h1>Librería Montan</h1>

<nav>
<a href="index.php">Inicio</a>
<a href="productos.php">Productos</a>
<a href="registrar.php">Registrar</a>
</nav>

</header>

<div class="formulario">

<h2>Registrar Producto</h2>

<form action="guardar.php" method="POST">

<input type="text" name="nombre" placeholder="Nombre del producto" required>

<input type="text" name="categoria" placeholder="Categoría" required>

<input type="number" step="0.01" name="precio" placeholder="Precio" required>

<input type="number" name="stock" placeholder="Stock" required>

<button type="submit">
Guardar Producto
</button>

</form>

</div>

</body>
</html>