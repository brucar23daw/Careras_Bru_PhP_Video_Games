<?php

require_once "../core/core.php";

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'gestor') {
    header('Location: ../public/login.php');
}

$data = [];
$id = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : null;
$game = get_game_by_id($id);

if ($game === null) {
    $data['request_error'] = 'El juego no existe';
} else $data['game'] = $game;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;
    $release_date = isset($_POST['release_date']) ? $_POST['release_date'] : null;
    $price = isset($_POST['price']) ? $_POST['price'] : null;
    $stock = isset($_POST['stock']);
    $iva = isset($_POST['iva']) ? $_POST['iva'] : null;

    if (
        $name !== null &&
        $description !== null &&
        $release_date !== null &&
        $price !== null &&
        $iva !== null
    ) {
        $game->name = $name;
        $game->description = $description;
        $game->price = $price;
        $game->release = strtotime($release_date);
        $game->stock = $stock;
        $game->iva = floatval($iva);

        save_game($game);
        
        if ($_FILES['image']['error'] == 0) {
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $game->image)) {
                $error = 'No se ha podido guardar la imagen';
            }
        } 
    } else $error = 'Datos no válidos';
}

if (isset($error)) $data['error'] = $error;

render_template('videogames/edit', $data);