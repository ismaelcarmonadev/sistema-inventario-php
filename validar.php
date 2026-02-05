<?php
session_start(); // Iniciamos el motor de sesiones
include("conexion.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Consultamos si existe el usuario con esa contraseña
$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) > 0) {
    // Si existe, guardamos su nombre en la "mochila" de la sesión
    $_SESSION['usuario_logueado'] = $usuario;
    header("Location: index.php"); // ¡Bienvenido!
} else {
    // Si no existe, lo mandamos de vuelta con un error
    header("Location: login.php?error=1");
}
?>