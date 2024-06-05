<?php
include('../includes/header.php');
include('../includes/navbar.php');
include('../includes/functions.php');

session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

// Código para gestionar gestores (crear, modificar, eliminar)
?>

<h1>Gestionar Gestores</h1>
<!-- Formulario para gestionar gestores -->

<?php include('../includes/footer.php'); ?>
