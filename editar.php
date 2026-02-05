<?php
session_start();
if (!isset($_SESSION['usuario_logueado'])) { header("Location: login.php"); exit(); }
include("conexion.php");

// Obtener datos del producto
$id = $_GET['id'];
$resultado = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $id");
$p = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include("menu.php"); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 d-flex align-items-center">
                            <span class="material-icons me-2">edit</span> Editar Producto #<?php echo $p['id']; ?>
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="actualizar.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nombre del Producto</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $p['nombre']; ?>" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Precio (USD)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" name="precio" class="form-control" value="<?php echo $p['precio']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Stock Actual</label>
                                    <input type="number" name="stock" class="form-control" value="<?php echo $p['stock']; ?>" required>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="material-icons align-middle">save</span> Guardar Cambios
                                </button>
                                <a href="index.php" class="btn btn-outline-secondary">Cancelar y Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>