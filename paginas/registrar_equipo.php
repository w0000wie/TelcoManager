<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
include('../includes/conexion.php');
include('../includes/header.php');
include('../includes/menu.php');

$nodos = $conexion->query("SELECT * FROM nodos");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $nodo = $_POST['nodo'];

    $sql = "INSERT INTO equipos (tipo_equipo, modelo, marca, nodo_id) VALUES ('$tipo', '$modelo', '$marca', '$nodo')";
    $conexion->query($sql);
    header("Location: dashboard.php");
}
?>

<main>
    <h2>Registrar Equipo</h2>
    <form method="POST">
        <label>Tipo de equipo:</label>
        <input type="text" name="tipo" required>
        <label>Modelo:</label>
        <input type="text" name="modelo" required>
        <label>Marca:</label>
        <input type="text" name="marca">
        <label>Nodo asociado:</label>
        <select name="nodo" required>
            <?php while ($fila = $nodos->fetch_assoc()) {
                echo "<option value='{$fila['id']}'>{$fila['nombre_nodo']}</option>";
            } ?>
        </select>
        <input type="submit" value="Registrar">
    </form>
</main>
</body>
</html>
