<!DOCTYPE html>
<html lang="es">
<?php render_template('parts/head', ['title' => 'Crear cuenta']); ?>
<body>
    <main>
        <h1>Crear cuenta</h1>
        <form method="post" action="">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Crear cuenta">
        </form>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <p><a href="index.php">Volver al inicio</a></p>
    </main>
    <?php render_template('parts/footer'); ?>
</body>
</html>