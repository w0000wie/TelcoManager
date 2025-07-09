<?php
session_start();
include('../includes/conexion.php');

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = sha1($_POST['clave']);

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $usuario_data = $resultado->fetch_assoc();
        $_SESSION['usuario'] = $usuario_data['usuario'];
        $_SESSION['nombre'] = $usuario_data['nombre_completo'];
        $_SESSION['rol'] = $usuario_data['tipo_usuario'];
        header("Location: dashboard.php");
        exit();
    } else {
        $mensaje = "Usuario o clave incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión - TelcoManager</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="login-body">
    <div class="login-container">
        <img src="../imagenes/logo.png" alt="Logo TelcoManager" class="login-logo">
        <h2>Inicio de Sesión - TelcoManager</h2>

        <form method="POST" action="">
            <label>Usuario:</label>
            <input type="text" name="usuario" required>
            <label>Clave:</label>
            <input type="password" name="clave" required>
            <input type="submit" value="Iniciar Sesión">
        </form>

        <?php if ($mensaje): ?>
            <p class="mensaje-error"><?php echo $mensaje; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
