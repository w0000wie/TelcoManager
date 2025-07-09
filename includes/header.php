<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TelcoManager</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header class="encabezado">
        <div class="logo">
            <img src="../imagenes/logo.png" alt="Logo TelcoManager">
        </div>
        <div class="titulo-sesion">
            <h1>TelcoManager</h1>
            <?php if (isset($_SESSION['usuario'])): ?>
                <p>Bienvenido, <strong><?php echo $_SESSION['nombre']; ?></strong> | Rol: <strong><?php echo $_SESSION['rol']; ?></strong></p>
            <?php endif; ?>
        </div>
    </header>
