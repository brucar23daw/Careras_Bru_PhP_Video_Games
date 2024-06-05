<!DOCTYPE html>
<html lang="es">
<?php render_template('parts/head', ['title' => 'Panel de control']); ?>
<body>
    <?php render_template('parts/navbar'); ?>
    <?php if ($role === 'admin'): ?>
        <main>
        <h1>Panel de Administrador</h1>
        <ul>
            <li><a href="../users/admin.php">Gestionar Administrador</a></li>
            <li><a href="../users/gestor.php">Gestionar Gestores</a></li>
            <li><a href="../users/client.php">Gestionar Clientes</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </main>
    <?php endif;?>
    <?php if ($role === 'gestor'): ?>
        <h1>Panel de Gestor</h1>
        <ul>
            <li><a href="../users/client.php">Gestionar Clientes</a></li>
            <li><a href="../videogames/add.php">Añadir videojuego</a></li>
            <li><a href="../videogames/list.php">Lista de videojuegos</a></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </main>
    <?php endif;?>
    <?php if ($role === 'client'): ?>
        <main>
            <h1>Panel de Cliente</h1>
            <p>Bienvenido, <?=$username ?>.</p>
            <ul>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
         </main>
    <?php endif;?>
    <?php render_template('parts/footer'); ?>
</body>
</html>