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
    $resultado = $conexion->query("SELECT * FROM equipos WHERE id = $id");
    $equipo = $resultado->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $estado = $_POST['estado'];
    $conexion->query("UPDATE equipos SET estado = '$estado' WHERE id = $id");
    header("Location: ver_reportes.php");
}
?>

<main>
    <h2>Modificar Estado del Equipo</h2>

    <?php if (isset($equipo)): ?>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $equipo['id']; ?>">

        <label>Tipo de equipo:</label>
        <p><?php echo $equipo['tipo_equipo']; ?></p>

        <label>Estado actual:</label>
        <select name="estado" required>
            <option value="operativo" <?php if ($equipo['estado'] == 'operativo') echo 'selected'; ?>>Operativo</option>
            <option value="fallando" <?php if ($equipo['estado'] == 'fallando') echo 'selected'; ?>>Fallando</option>
            <option value="reemplazo" <?php if ($equipo['estado'] == 'reemplazo') echo 'selected'; ?>>En Reemplazo</option>
        </select>

        <input type="submit" value="Actualizar Estado">
    </form>
    <?php else: ?>
        <p>No se encontró el equipo.</p>
    <?php endif; ?>
</main>
</body>
</html>
