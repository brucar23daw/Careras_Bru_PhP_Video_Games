<?php

require_once "../core/core.php";

session_start();

include('../includes/header.php');
include('../includes/navbar.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: ../public/login.php');
    exit();
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
?>
<h1>Añadir videojuego</h1>
<form method="post" action="" enctype="multipart/form-data">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="name">Description:</label>
    <textarea name="description"></textarea>
    <br>
    <label for="release_date">Fecha de lanzamiento</label>
    <input type="date" id="release_date" name="release_date" required>
    <br>
    <label for="price">Precio (€)</label>
    <input type="number" min="0" id="price" name="price" required>
    <br>
    <label for="iva">IVA (%)</label>
    <input type="number" min="0" max="21" value="21" id="iva" name="iva" required>
    <br>
    <label for="image">Imagen:</label>
    <input type="file" name="image" accept="image/png" required>
    <br>
    <label for="stock">Disponible: </label>
    <input type="checkbox" name="stock">
    <br>
    <input type="submit" value="Crear cuenta">
</form>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<p><a href="../public/admin_dashboard.php">Volver al dashboard</a></p>

<?php include('../includes/footer.php'); ?>