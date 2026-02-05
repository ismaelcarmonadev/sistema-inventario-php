<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <span class="material-icons me-2">inventory_2</span> 
            <strong>SISTEMA PRO</strong>
        </a>
        <div class="ms-auto d-flex align-items-center">
            <span class="text-white-50 me-3">
                <small>Hola, <?php echo $_SESSION['usuario_logueado']; ?></small>
            </span>
            <a href="logout.php" class="btn btn-danger btn-sm d-flex align-items-center">
                <span class="material-icons" style="font-size:16px">logout</span>&nbsp;Salir
            </a>
        </div>
    </div>
</nav>