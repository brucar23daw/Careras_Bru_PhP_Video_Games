<!DOCTYPE html>
<html lang="es">
<?php render_template('parts/head', ['title' => 'Tienda de videojuegos']); ?>
<body>
    <main>
        <h1>Bienvenido a la Tienda de Videojuegos</h1>
        <p>Accede a las siguientes opciones:</p>
        <ul>
            <li><a href="info.php">Información sobre el funcionamiento</a></li>
            <li><a href="login.php">Iniciar sesión</a></li>
        </ul>
    </main>
    <?php render_template('parts/footer'); ?>
</body>
</html>