<?php
session_start(); // 1. Abrimos la mochila
if (!isset($_SESSION['usuario_logueado'])) { 
    header("Location: login.php"); // 2. Si no hay nadie, para afuera
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include("menu.php"); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">📦 Nuevo Producto</h5>
                    </div>
                    <div class="card-body">
                        <form action="insertar.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Precio</label>
                                <input type="number" name="precio" step="0.01" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input type="number" name="stock" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Guardar Producto</button>
                            <a href="index.php" class="btn btn-link w-100 mt-2">Volver al Inventario</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>