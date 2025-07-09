<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
include('../includes/header.php');
include('../includes/menu.php');
?>

<main>
    <h2>Panel Principal</h2>
    <p>Bienvenido(a), <?php echo $_SESSION['nombre']; ?>.</p>

    <?php if ($_SESSION['rol'] == 'admin'): ?>
        <p>Acceso completo habilitado para administración del sistema.</p>
    <?php else: ?>
        <p>Acceso limitado para técnicos. Solo puede registrar y consultar información.</p>
    <?php endif; ?>
</main>
</body>
</html>
