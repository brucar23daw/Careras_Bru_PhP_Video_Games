<?php

require_once "../core/core.php";
include('../includes/header.php');
include('../includes/navbar.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (validar_usuario($username, $password)) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = obtener_rol($username);
        var_dump($_SESSION['role']);
        header('Location: ' . obtener_dashboard($_SESSION['role']));
    } else {
        $error = "Nombre de usuario o contraseña incorrectos.";
    }
}
?>

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

<?php include('../includes/footer.php'); ?>
