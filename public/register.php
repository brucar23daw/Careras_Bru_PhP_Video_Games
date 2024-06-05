<?php

require_once "../core/core.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if (
        $username !== null &&
        $email !== null &&
        $password !== null
    ) {
        if (get_user_by_username($username) === null) {
            $user = new User($username, 'client', $email);
            $user->hashPassword($password);
            save_user($user);
            header("Location: login.php");
        } else $error = "Ya existe una cuenta con el nombre de usuario '$username'";
    } else $error = 'Datos no válidos';
}

$data = [];

if (isset($error)) $data['error'] = $error;

render_template('register', $data);