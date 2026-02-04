<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario Pro - Panel de Control</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; padding: 40px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; }
        form { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 30px; }
        input, textarea { padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .full-width { grid-column: span 2; }
        button { grid-column: span 2; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f8f9fa; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <h2>📦 Gestión de Inventario</h2>
        
        <form action="registrar.php" method="POST">
            <input type="text" name="nombre" placeholder="Producto" required>
            <input type="number" step="0.01" name="precio" placeholder="Precio" required>
            <input type="number" name="stock" placeholder="Stock" required>
            <textarea name="descripcion" placeholder="Descripción" class="full-width"></textarea>
            <button type="submit">Agregar al Inventario</button>
        </form>

        <hr>

        <table>
            <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th> </tr>
</thead>
<tbody>
    <?php
    $query = "SELECT * FROM productos ORDER BY id DESC";
    $resultado = mysqli_query($conexion, $query);

    while($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>\${$row['precio']}</td>
                <td>{$row['stock']}</td>
                <td>
                    <a href='editar.php?id={$row['id']}' style='color: blue;'>Editar</a> | 
                    <a href='eliminar.php?id={$row['id']}' style='color: red;' onclick='return confirm(\"¿Seguro?\")'>Eliminar</a>
                </td>
              </tr>";
    }
    ?>
</tbody>
        </table>
    </div>
</body>
</html>