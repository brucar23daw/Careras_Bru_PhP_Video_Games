<?php

require_once "../core/core.php";
include('../includes/header.php');
include('../includes/navbar.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if (
        $username !== null &&
        $email !== null &&
        $password !== null
    ) {
        if (get_user_by_username($username) === null) {
            $user = new User($username, 'client', $email);
            $user->hashPassword($password);
            save_user($user);
            header("Location: login.php");
        } else $error = "Ya existe una cuenta con el nombre de usuario '$username'";
    } else $error = 'Datos no válidos';
}
?>
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

<?php include('../includes/footer.php'); ?>