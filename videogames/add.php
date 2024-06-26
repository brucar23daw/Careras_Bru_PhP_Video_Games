<?php

require_once "../core/core.php";

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'gestor') {
    header('Location: ../public/login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        $iva !== null &&
        isset($_FILES['image'])
    ) {
        $game = new Videogame($name, $description, floatval($price));
        $game->release = strtotime($release_date);
        $game->image = "../images/" . $game->id . ".png";
        $game->stock = $stock;
        $game->iva = floatval($iva);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $game->image)) {
            save_game($game);
        } else {
            $error = 'No se ha podido añadir, vuelva a intentar';
        }
    } else $error = 'Datos no válidos';
}

$data = [];

if (isset($error)) $data['error'] = $error;

render_template('videogames/add', $data);