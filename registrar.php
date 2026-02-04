<?php
include("conexion.php"); // Reutilizamos la conexión que ya probaste

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO productos (nombre, descripcion, precio, stock) 
            VALUES ('$nombre', '$descripcion', '$precio', '$stock')";

    if (mysqli_query($conexion, $sql)) {
        echo "<script>alert('Producto registrado con éxito'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}
?>