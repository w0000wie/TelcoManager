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
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $tipo = $_POST['tipo'];
    $distancia = $_POST['distancia'];

    $sql = "INSERT INTO enlaces (nodo_origen_id, nodo_destino_id, tipo_enlace, distancia_km) 
            VALUES ('$origen', '$destino', '$tipo', '$distancia')";
    $conexion->query($sql);
    header("Location: dashboard.php");
}
?>

<main>
    <h2>Registrar Enlace</h2>
    <form method="POST">
        <label>Nodo origen:</label>
        <select name="origen" required>
            <?php while ($fila = $nodos->fetch_assoc()) {
                echo "<option value='{$fila['id']}'>{$fila['nombre_nodo']}</option>";
            } ?>
        </select>
        <label>Nodo destino:</label>
        <select name="destino" required>
            <?php
            $nodos->data_seek(0);
            while ($fila = $nodos->fetch_assoc()) {
                echo "<option value='{$fila['id']}'>{$fila['nombre_nodo']}</option>";
            } ?>
        </select>
        <label>Tipo de enlace:</label>
        <input type="text" name="tipo">
        <label>Distancia (km):</label>
        <input type="number" name="distancia" step="0.01">
        <input type="submit" value="Registrar">
    </form>
</main>
</body>
</html>
