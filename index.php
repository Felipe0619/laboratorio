<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Pago</title>
</head>
<body>
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=registro_pagos;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

// Procesar el formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deudor = $_POST['deudor'];
    $cuota = $_POST['cuota'];
    $cuota_capital = $_POST['cuota_capital'];
    $fecha_pago = $_POST['fecha_pago'];

    // Insertar el nuevo pago en la base de datos
    $sentencia = $db->prepare("INSERT INTO pagos (deudor, cuota, cuota_capital, fecha_pago) VALUES (?, ?, ?, ?)");
    $sentencia->execute([$deudor, $cuota, $cuota_capital, $fecha_pago]);

    // Redireccionar a la página de lista de pagos
    header("Location: listar_pagos.php");
    exit();
}
?>

<h1>Ingresar Nuevo Pago</h1>
<form action="" method="post">
    <label for="deudor">Deudor:</label>
    <input type="text" name="deudor" id="deudor" required><br><br>
    
    <label for="cuota">Cuota:</label>
    <input type="number" name="cuota" id="cuota" required><br><br>
    
    <label for="cuota_capital">Cuota Capital:</label>
    <input type="number" step="0.01" name="cuota_capital" id="cuota_capital" required><br><br>
    
    <label for="fecha_pago">Fecha de Pago:</label>
    <input type="date" name="fecha_pago" id="fecha_pago" required><br><br>
    
    <input type="submit" value="Ingresar Pago">
</form>
<br>
<a href="listar_pagos.php">Volver a la lista de pagos</a>
</body>
</html>