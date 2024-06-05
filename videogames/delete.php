<?php

require_once "../core/core.php";

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'gestor') {
    header('Location: ../public/login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['game']) && !empty($_POST['game']) ? $_POST['game'] : null;

    if ($id !== null) {
        $game = get_game_by_id($id);

        if ($game !== null) {
            unlink($game->image);
            delete_game($id);
        }
    }
}

header('Location: list.php');