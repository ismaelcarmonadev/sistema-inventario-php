<?php
include("conexion.php");
$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id = $id";
$res = mysqli_query($conexion, $sql);
$p = mysqli_fetch_assoc($res);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock  = $_POST['stock'];
    
    $update = "UPDATE productos SET nombre='$nombre', precio='$precio', stock='$stock' WHERE id=$id";
    if (mysqli_query($conexion, $update)) {
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
    <link rel="stylesheet" href="estilos.css"> </head>
<body>
    <h2>Editar Producto</h2>
    <form method="POST">
        <input type="text" name="nombre" value="<?php echo $p['nombre']; ?>">
        <input type="number" step="0.01" name="precio" value="<?php echo $p['precio']; ?>">
        <input type="number" name="stock" value="<?php echo $p['stock']; ?>">
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>