<?php
include('../includes/header.php');
include('../includes/navbar.php');
include('../includes/functions.php');

// No es necesario iniciar sesión nuevamente si ya hay una sesión activa

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}
?>

<h1>Gestionar Administrador</h1>
<!-- Formulario para modificar datos del administrador -->

<?php include('../includes/footer.php'); ?>
