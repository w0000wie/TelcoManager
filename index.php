<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: paginas/dashboard.php");
    exit();
} else {
    header("Location: paginas/login.php");
    exit();
}
?>
