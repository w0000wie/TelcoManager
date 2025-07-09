<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
include('../includes/conexion.php');
include('../includes/header.php');
include('../includes/menu.php');
?>

<main>
   <h3>Reporte de Nodos</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ubicación</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $consulta_nodos = $conexion->query("SELECT * FROM nodos");
        while ($nodo = $consulta_nodos->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$nodo['id']}</td>";
            echo "<td>{$nodo['nombre_nodo']}</td>";
            echo "<td>{$nodo['ubicacion']}</td>";
            echo "<td>{$nodo['estado']}</td>";
            echo "<td><a href='modificar_nodo.php?id={$nodo['id']}'>Modificar</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<h2>Reporte de equipos</h2>
<table>
    <tr>
        <th>ID</th><th>Tipo</th><th>Modelo</th><th>Marca</th><th>Nodo</th><th>Estado</th><th>Acción</th>
    </tr>
    <?php
    $equipos = $conexion->query("SELECT e.*, n.nombre_nodo FROM equipos e 
                                 JOIN nodos n ON e.nodo_id = n.id");
    while ($fila = $equipos->fetch_assoc()) {
        echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['tipo_equipo']}</td>
                <td>{$fila['modelo']}</td>
                <td>{$fila['marca']}</td>
                <td>{$fila['nombre_nodo']}</td>
                <td>{$fila['estado']}</td>";

        // Mostrar "Modificar" solo para administradores
        if ($_SESSION['rol'] == 'admin') {
            echo "<td><a href='modificar_equipo.php?id={$fila['id']}'>Modificar</a></td>";
        } else {
            echo "<td>-</td>";
        }

        echo "</tr>";
    }
    ?>
</table>
    <h2>Reporte de enlaces</h2>
<table>
    <tr>
        <th>ID</th><th>Origen</th><th>Destino</th><th>Tipo</th><th>Distancia</th><th>Estado</th><th>Acción</th>
    </tr>
    <?php
    $enlaces = $conexion->query("SELECT e.*, n1.nombre_nodo AS origen, n2.nombre_nodo AS destino 
                                 FROM enlaces e
                                 JOIN nodos n1 ON e.nodo_origen_id = n1.id
                                 JOIN nodos n2 ON e.nodo_destino_id = n2.id");

    while ($fila = $enlaces->fetch_assoc()) {
        echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['origen']}</td>
                <td>{$fila['destino']}</td>
                <td>{$fila['tipo_enlace']}</td>
                <td>{$fila['distancia_km']} km</td>
                <td>{$fila['estado']}</td>";

        if ($_SESSION['rol'] == 'admin') {
            echo "<td><a href='modificar_enlace.php?id={$fila['id']}'>Modificar</a></td>";
        } else {
            echo "<td>-</td>";
        }

        echo "</tr>";
    }
    ?>
</table>
    </table>
</main>
</body>
</html>
