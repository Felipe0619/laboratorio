<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pagos</title>
</head>
<body>
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=registro_pagos;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

// Enviar la consulta y obtener los resultados
$sentencia = $db->prepare("SELECT * FROM pagos");
$sentencia->execute();
$pagos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Lista de Pagos</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Deudor</th>
        <th>Cuota</th>
        <th>Cuota Capital</th>
        <th>Fecha de Pago</th>
    </tr>
    <?php foreach ($pagos as $pago) { ?>
        <tr>
            <td><?php echo htmlspecialchars($pago['id']); ?></td>
            <td><?php echo htmlspecialchars($pago['deudor']); ?></td>
            <td><?php echo htmlspecialchars($pago['cuota']); ?></td>
            <td><?php echo htmlspecialchars($pago['cuota_capital']); ?></td>
            <td><?php echo htmlspecialchars($pago['fecha_pago']); ?></td>
        </tr>
    <?php } ?>
</table>
<br>
<a href="ingresar_pago.php">Ingresar nuevo pago</a>
</body>
</html>