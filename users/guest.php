<?php
include('../includes/header.php');
include('../includes/functions.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'guest') {
    header('Location: ../public/index.php');
    exit();
}
?>

<?php include('../includes/navbar.php'); ?>

<h2>Bienvenido, Invitado</h2>
<p>Aquí puedes ver información sobre nuestros videojuegos.</p>
<p><a href="../public/logout.php">Cerrar Sesión</a></p>

<?php include('../includes/footer.php'); ?>
