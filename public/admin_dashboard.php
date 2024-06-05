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

<h1>Panel de Administrador</h1>
<ul>
    <li><a href="../users/admin.php">Gestionar Administrador</a></li>
    <li><a href="../users/gestor.php">Gestionar Gestores</a></li>
    <li><a href="../users/client.php">Gestionar Clientes</a></li>
    <li><a href="logout.php">Cerrar sesión</a></li>
</ul>

<?php include('../includes/footer.php'); ?>
