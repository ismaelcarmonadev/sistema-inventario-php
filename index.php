<?php
session_start();
if (!isset($_SESSION['usuario_logueado'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include("menu.php"); ?>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>📋 Mi Inventario</h2>
            <a href="registro.php" class="btn btn-success d-flex align-items-center">
                <span class="material-icons">add</span> Nuevo Producto
            </a>
        </div>
        <div class="d-flex justify-content-end mb-3">
    <span class="me-3 align-self-center text-muted">
        Bienvenido, <strong><?php echo $_SESSION['usuario_logueado']; ?></strong>
    </span>
    <a href="logout.php" class="btn btn-outline-danger btn-sm d-flex align-items-center">
        <span class="material-icons" style="font-size: 18px;">logout</span> &nbsp;Cerrar Sesión
    </a>
</div>
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("conexion.php");
                        $resultado = mysqli_query($conexion, "SELECT * FROM productos ORDER BY id DESC");
                        while($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>
                                    <td>{$fila['id']}</td>
                                    <td>{$fila['nombre']}</td>
                                    <td>$" . number_format($fila['precio'], 2) . "</td>
                                    <td>{$fila['stock']}</td>
                                    <td>
                                        <div class='btn-group'>
                                            <a href='editar.php?id={$fila['id']}' class='btn btn-outline-primary btn-sm'>
                                                <span class='material-icons' style='font-size:18px'>edit</span>
                                            </a>
                                            <a href='eliminar.php?id={$fila['id']}' class='btn btn-outline-danger btn-sm' onclick='return confirm(\"¿Eliminar?\")'>
                                                <span class='material-icons' style='font-size:18px'>delete</span>
                                            </a>
                                        </div>
                                    </td>
                                  </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>