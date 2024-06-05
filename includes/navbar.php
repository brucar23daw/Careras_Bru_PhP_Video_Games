<nav>
    <ul>
        <li><a href="../public/index.php">Inicio</a></li>
        <li><a href="../public/info.php">Información</a></li>
        <li><a href="../public/login.php">Iniciar sesión</a></li>
        <?php if (isset($_SESSION['role'])): ?>
            <?php if ($_SESSION['role'] == 'admin'): ?>
                <li><a href="../public/admin_dashboard.php">Panel de Admin</a></li>
            <?php elseif ($_SESSION['role'] == 'gestor'): ?>
                <li><a href="../public/gestor_dashboard.php">Panel de Gestor</a></li>
            <?php elseif ($_SESSION['role'] == 'client'): ?>
                <li><a href="../public/client_dashboard.php">Panel de Cliente</a></li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
</nav>
