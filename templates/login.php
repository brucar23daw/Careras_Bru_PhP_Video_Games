<!DOCTYPE html>
<html lang="es">
<?php render_template('parts/head', ['title' => 'Iniciar sesión']); ?>
<body>
    <main>
        <h1>Iniciar sesión</h1>
        <form method="post" action="">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Iniciar sesión">
        </form>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <p><a href="register.php">Crear cuenta</a></p>
        <p><a href="index.php">Volver al inicio</a></p>
    </main>
    <?php render_template('parts/footer'); ?>
</body>
</html>