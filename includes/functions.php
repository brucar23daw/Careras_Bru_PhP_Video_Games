
<?php
session_start();

$usuarios = [
    'admin' => [
        'password' => 'clotfje',
        'role' => 'admin',
        'email' => 'admin@fjeclot.net'
    ],
    'client' => [
        'password' => 'fjeclot',
        'role' => 'client',
        'email' => 'client@fjeclot.net'
    ],
    'gestor' => [
        'password' => 'fjeclot1',
        'role' => 'gestor',
        'email' => 'guest@fjeclot.net'
    ]
];

function validar_usuario($username, $password) {
    global $usuarios;
    return isset($usuarios[$username]) && $usuarios[$username]['password'] == $password;
}

function obtener_rol($username) {
    global $usuarios;
    return $usuarios[$username]['role'];
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
?>
