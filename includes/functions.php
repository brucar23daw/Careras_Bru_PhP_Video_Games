<?php
session_start();

// Usuarios de prueba
$usuarios = [
    'admin' => ['password' => 'admin123', 'role' => 'admin'],
    'client' => ['password' => 'client123', 'role' => 'client'],
    'guest' => ['password' => 'guest123', 'role' => 'guest'],
];

// Función para autenticar al usuario
function autenticar($nombre, $contrasena) {
    global $usuarios;
    if (isset($usuarios[$nombre]) && $usuarios[$nombre]['password'] === $contrasena) {
        return $usuarios[$nombre]['role'];
    }
    return false;
}

// Función para redirigir según el rol del usuario
function redirigir_por_rol($role) {
    switch ($role) {
        case 'admin':
            header('Location: ../users/admin.php');
            break;
        case 'client':
            header('Location: ../users/client.php');
            break;
        case 'guest':
            header('Location: ../users/guest.php');
            break;
        default:
            header('Location: ../public/index.php');
            break;
    }
}
?>
