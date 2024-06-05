<?php
include('../includes/header.php');
include('../includes/functions.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../public/index.php');
    exit();
}
?>

<?php include('../includes/navbar.php'); ?>

<h2>Bienvenido, Administrador</h2>
<p>Aquí puedes gestionar la tienda de videojuegos.</p>
<p><a href="../public/logout.php">Cerrar Sesión</a></p>

<?php include('../includes/footer.php'); ?>
