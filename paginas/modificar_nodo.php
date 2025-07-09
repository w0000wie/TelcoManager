<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php");
    exit();
}

include('../includes/conexion.php');
include('../includes/header.php');
include('../includes/menu.php');

$nodo = null;

// Obtener datos del nodo seleccionado
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $resultado = $conexion->query("SELECT * FROM nodos WHERE id = $id");
    if ($resultado && $resultado->num_rows > 0) {
        $nodo = $resultado->fetch_assoc();
    }
}

// Procesar actualización
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'], $_POST['estado'])) {
    $id = intval($_POST['id']);
    $estado = $conexion->real_escape_string($_POST['estado']);

    $conexion->query("UPDATE nodos SET estado = '$estado' WHERE id = $id");
    header("Location: ver_reportes.php");
    exit();
}
?>

<main>
    <h2>Modificar Estado del Nodo</h2>

    <?php if ($nodo): ?>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $nodo['id']; ?>">

            <label>Nombre del nodo:</label>
            <p><strong><?php echo htmlspecialchars($nodo['nombre_nodo']); ?></strong></p>

            <label>Estado actual:</label>
            <select name="estado" required>
                <option value="activo" <?php if ($nodo['estado'] == 'activo') echo 'selected'; ?>>Activo</option>
                <option value="inactivo" <?php if ($nodo['estado'] == 'inactivo') echo 'selected'; ?>>Inactivo</option>
            </select>

            <br><br>
            <input type="submit" value="Actualizar Estado">
        </form>
    <?php else: ?>
        <p style="color: red;">Nodo no encontrado o ID inválido.</p>
    <?php endif; ?>
</main>
</body>
</html>
