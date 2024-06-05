<!DOCTYPE html>
<html lang="es">
<?php render_template('parts/head', ['title' => 'Tienda de videojuegos - Información']); ?>
<body>
    <?php if ($logged) render_template('parts/navbar'); ?>
    <main>
        <h1>Información sobre el funcionamiento</h1>
        <p>Aquí encontrarás información sobre cómo validar usuarios, trabajar con cestas y pedidos, y desconectarse de la aplicación.</p>
        <p><a href="index.php">Volver al inicio</a></p>
    </main>
    <?php render_template('parts/footer'); ?>
</body>
</html>