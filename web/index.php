```php
<?php

include("conexion.php");

$totalProductos = $conn->query("
SELECT COUNT(*) total
FROM productos
")->fetch_assoc()['total'];

$totalStock = $conn->query("
SELECT IFNULL(SUM(stock),0) total
FROM productos
")->fetch_assoc()['total'];

$totalInventario = $conn->query("
SELECT IFNULL(SUM(precio*stock),0) total
FROM productos
")->fetch_assoc()['total'];

$totalVentas = $conn->query("
SELECT COUNT(*) total
FROM ventas
")->fetch_assoc()['total'];

$ingresos = $conn->query("
SELECT IFNULL(SUM(total),0) total
FROM ventas
")->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Librería Montan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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

<div class="header-dashboard">

<div>
<h1>📚 Librería Montan</h1>
<p>Panel general de administración</p>
</div>

<div class="fecha">
<?= date('d/m/Y') ?>
</div>

</div>

<div class="cards">

<div class="card-dashboard card-purple">
<div>
<h5>Total Productos</h5>
<h2><?= $totalProductos ?></h2>
</div>
<div class="icono">📦</div>
</div>

<div class="card-dashboard card-green">
<div>
<h5>Stock Total</h5>
<h2><?= $totalStock ?></h2>
</div>
<div class="icono">📚</div>
</div>

<div class="card-dashboard card-yellow">
<div>
<h5>Inventario</h5>
<h2>Bs <?= number_format($totalInventario,2) ?></h2>
</div>
<div class="icono">💰</div>
</div>

<div class="card-dashboard card-blue">
<div>
<h5>Ventas</h5>
<h2><?= $totalVentas ?></h2>
</div>
<div class="icono">🛒</div>
</div>

<div class="card-dashboard card-pink">
<div>
<h5>Ingresos</h5>
<h2>Bs <?= number_format($ingresos,2) ?></h2>
</div>
<div class="icono">📈</div>
</div>

</div>

<div class="paneles">

<div class="panel grande">

<h3>Ventas de la Librería</h3>

<canvas id="ventasChart"></canvas>

</div>

<div class="panel">

<h3>Top Productos</h3>

<ul class="ranking">

<li>🥇 Lápiz Faber Castell</li>
<li>🥈 Cuaderno Gloria</li>
<li>🥉 Marcador Permanente</li>
<li>4️⃣ Borrador</li>
<li>5️⃣ Regla</li>

</ul>

</div>

</div>

<div class="paneles">

<div class="panel grande">

<h3>Últimas Actividades</h3>

<table>

<tr>
<th>Evento</th>
<th>Estado</th>
</tr>

<tr>
<td>Productos registrados</td>
<td><?= $totalProductos ?></td>
</tr>

<tr>
<td>Ventas realizadas</td>
<td><?= $totalVentas ?></td>
</tr>

<tr>
<td>Stock disponible</td>
<td><?= $totalStock ?></td>
</tr>

</table>

</div>

<div class="panel">

<h3>Estado del Sistema</h3>

<div class="estado ok">
✅ Base de datos conectada
</div>

<div class="estado ok">
✅ Docker activo
</div>

<div class="estado ok">
✅ PHP funcionando
</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(
document.getElementById('ventasChart'),
{
type:'line',
data:{
labels:[
'Lun',
'Mar',
'Mie',
'Jue',
'Vie',
'Sab',
'Dom'
],
datasets:[
{
label:'Ventas',
data:[12,19,8,15,25,18,20],
fill:true
}
]
}
}
);

</script>

</body>
</html>
```
