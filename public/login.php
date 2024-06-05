<?php

require_once "../core/core.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (validar_usuario($username, $password)) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = obtener_rol($username);
        
        header('Location: dashboard.php');
    } else {
        $error = "Nombre de usuario o contraseña incorrectos.";
    }
}

$data = [];

if (isset($error)) $data['error'] = $error;

render_template('login', $data);

?>
