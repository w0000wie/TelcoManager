<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$base_datos = "telcomanager_db";

$conexion = new mysqli($host, $usuario, $clave, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
