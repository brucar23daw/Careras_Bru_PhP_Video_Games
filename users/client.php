<?php

require_once "../core/core.php";

session_start();

include('../includes/header.php');
include('../includes/navbar.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] == 'client') {
    header('Location: login.php');
    exit();
}

// Código para gestionar clientes (crear, modificar, eliminar)
?>

<h1>Gestionar Clientes</h1>
<!-- Formulario para gestionar clientes -->

<?php include('../includes/footer.php'); ?>
