<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
include('../includes/conexion.php');
include('../includes/header.php');
include('../includes/menu.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_nodo = $_POST['nombre_nodo'];
    $ubicacion = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO nodos (nombre_nodo, ubicacion, descripcion) VALUES ('$nombre_nodo', '$ubicacion', '$descripcion')";
    $conexion->query($sql);
    header("Location: dashboard.php");
}
?>

<main>
    <h2>Registrar Nodo</h2>
    <form method="POST">
        <label>Nombre del nodo:</label>
        <input type="text" name="nombre_nodo" required>
        <label>Ubicación:</label>
        <input type="text" name="ubicacion">
        <label>Descripción:</label>
        <textarea name="descripcion"></textarea>
        <input type="submit" value="Registrar">
    </form>
</main>
</body>
</html>
