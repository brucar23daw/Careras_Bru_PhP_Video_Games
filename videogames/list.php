<?php

require_once "../core/core.php";

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'gestor') {
    header('Location: ../public/login.php');
}

$games = get_all_games();

render_template('videogames/list', [ 'games' => $games ]);