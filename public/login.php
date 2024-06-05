<?php
include('../includes/header.php');
include('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $role = autenticar($nombre, $contrasena);
    
    if ($role) {
        $_SESSION['usuario'] = $nombre;
        $_SESSION['role'] = $role;
        redirigir_por_rol($role);
    } else {
        $error = "Nombre de usuario o contraseña incorrectos.";
    }
}
?>

<?php include('../includes/navbar.php'); ?>

<h2>Validación de Usuarios</h2>

<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="post" action="">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="contrasena">Contraseña:</label><br>
    <input type="password" id="contrasena" name="contrasena" required><br><br>

    <input type="submit" value="Iniciar Sesión">
</form>

<?php include('../includes/footer.php'); ?>
