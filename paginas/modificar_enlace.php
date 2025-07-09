<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
include('../includes/conexion.php');
include('../includes/header.php');
include('../includes/menu.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $resultado = $conexion->query("SELECT * FROM enlaces WHERE id = $id");
    $enlace = $resultado->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $estado = $_POST['estado'];
    $conexion->query("UPDATE enlaces SET estado = '$estado' WHERE id = $id");
    header("Location: ver_reportes.php");
}
?>

<main>
    <h2>Modificar Estado del Enlace</h2>

    <?php if (isset($enlace)): ?>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $enlace['id']; ?>">

        <label>ID del Enlace:</label>
        <p><?php echo $enlace['id']; ?></p>

        <label>Estado actual:</label>
        <select name="estado" required>
            <option value="activo" <?php if ($enlace['estado'] == 'activo') echo 'selected'; ?>>Activo</option>
            <option value="inactivo" <?php if ($enlace['estado'] == 'inactivo') echo 'selected'; ?>>Inactivo</option>
        </select>

        <input type="submit" value="Actualizar Estado">
    </form>
    <?php else: ?>
        <p>No se encontró el enlace.</p>
    <?php endif; ?>
</main>
</body>
</html>