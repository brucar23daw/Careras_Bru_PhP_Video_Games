<?php

require_once "usermanager.php";

function validar_usuario($username, $password) {
    $usuario = get_user_by_username($username);

    if ($usuario !== null) {
        return $usuario->validatePassword($password);
    }

    return false;
}

function obtener_rol($username) {
    $usuario = get_user_by_username($username);
    return $usuario->role;
}

function obtener_dashboard($role) {
    if ($role == 'admin') return 'admin_dashboard.php';
    if ($role == 'gestor') return 'gestor_dashboard.php';
    if ($role == 'client') return 'client_dashboard.php';
    return 'login.php';
}

function guardar_usuarios() {
    // Aquí se guardan los datos en el archivo o en el array global
}