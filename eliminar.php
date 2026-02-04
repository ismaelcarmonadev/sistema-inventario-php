<?php
include("conexion.php");

// 1. Verificación de seguridad
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // 2. Preparar la consulta (Evita inyección SQL básica)
    $id = mysqli_real_escape_string($conexion, $id);
    $query = "DELETE FROM productos WHERE id = $id";

    // 3. Ejecutar y verificar
    if (mysqli_query($conexion, $query)) {
        // Redirigir con un parámetro de éxito
        header("Location: index.php?status=deleted");
    } else {
        // En caso de error de base de datos
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }
} else {
    // Si alguien intenta entrar a eliminar.php sin un ID válido
    header("Location: index.php");
}
exit();
?>