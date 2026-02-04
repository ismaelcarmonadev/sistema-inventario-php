<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sistema_inventario";

$conexion = mysqli_connect($host, $user, $pass, $db);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
} else {
    echo "¡Conexión exitosa a la base de datos!";
}
?>