<?php
include('../includes/header.php');
include('../includes/navbar.php');
include('../includes/functions.php');

// No es necesario iniciar sesión nuevamente si ya hay una sesión activa

?>

<h1>Panel de Cliente</h1>
<p>Bienvenido, <?php echo $_SESSION['username']; ?>.</p>
<ul>
    <li><a href="logout.php">Cerrar sesión</a></li>
</ul>

<?php include('../includes/footer.php'); ?>
