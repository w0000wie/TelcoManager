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
    <h2>Listado Detallado de Nodos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ubicación</th>
            <th>Descripción</th>
            <th>Estado</th>
        </tr>
        <?php
        $nodos = $conexion->query("SELECT * FROM nodos");
        while ($fila = $nodos->fetch_assoc()) {
            echo "<tr>
                    <td>{$fila['id']}</td>
                    <td>{$fila['nombre_nodo']}</td>
                    <td>{$fila['ubicacion']}</td>
                    <td>{$fila['descripcion']}</td>
                    <td>{$fila['estado']}</td>
                  </tr>";
        }
        ?>
    </table>

    <h2>Listado Detallado de Equipos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Nodo Asociado</th>
            <th>Estado</th>
        </tr>
        <?php
        $equipos = $conexion->query("SELECT e.*, n.nombre_nodo FROM equipos e JOIN nodos n ON e.nodo_id = n.id");
        while ($fila = $equipos->fetch_assoc()) {
            echo "<tr>
                    <td>{$fila['id']}</td>
                    <td>{$fila['tipo_equipo']}</td>
                    <td>{$fila['modelo']}</td>
                    <td>{$fila['marca']}</td>
                    <td>{$fila['nombre_nodo']}</td>
                    <td>{$fila['estado']}</td>
                  </tr>";
        }
        ?>
    </table>

    <h2>Listado Detallado de Enlaces</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nodo Origen</th>
            <th>Nodo Destino</th>
            <th>Tipo</th>
            <th>Distancia (km)</th>
            <th>Estado</th>
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
                    <td>{$fila['distancia_km']}</td>
                    <td>{$fila['estado']}</td>
                  </tr>";
        }
        ?>
    </table>
</main>
</body>
</html>
