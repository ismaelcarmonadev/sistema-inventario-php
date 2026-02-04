<?php
include("conexion.php");

// Validación de seguridad: ¿Existe el ID?
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id = $id";
$res = mysqli_query($conexion, $sql);
$p = mysqli_fetch_assoc($res);

// Si el producto no existe en la DB
if (!$p) { header("Location: index.php"); exit; }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $precio = $_POST['precio'];
    $stock  = $_POST['stock'];
    
    $update = "UPDATE productos SET nombre='$nombre', precio='$precio', stock='$stock' WHERE id=$id";
    if (mysqli_query($conexion, $update)) {
        echo "<script>alert('¡Actualizado correctamente!'); window.location='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto | <?php echo $p['nombre']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0">
                    <div class="card-header bg-warning text-dark text-center">
                        <h5 class="mb-0"><i class="fas fa-edit"></i> Modificar Producto</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nombre del Producto</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $p['nombre']; ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Precio ($)</label>
                                    <input type="number" step="0.01" name="precio" class="form-control" value="<?php echo $p['precio']; ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Stock</label>
                                    <input type="number" name="stock" class="form-control" value="<?php echo $p['stock']; ?>" required>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="index.php" class="btn btn-outline-secondary w-100">Cancelar</a>
                                <button type="submit" class="btn btn-primary w-100">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>