<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM productos WHERE id = $id";

    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php?mensaje=eliminado");
    } else {
        echo "Error al eliminar: " . mysqli_error($conexion);
    }
}
?>