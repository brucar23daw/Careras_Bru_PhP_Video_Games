<!DOCTYPE html>
<html lang="es">
<?php render_template('parts/head', ['title' => 'Tienda de videojuegos']); ?>
<body>
    <?php render_template('parts/navbar'); ?>
    <main>
        <?php if (isset($request_error)): ?>
            <h1>Error: <?=$request_error?></h1>
            <hr>
            <a href="../public/dashboard.php">Volver al panel</a>
        <?php else: ?>
            <h1>Editar videojuego</h1>
            <form method="post" action="" enctype="multipart/form-data">
                <div>
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" value="<?=$game->name?>" required>
                </div>
                <div>
                    <label for="release_date">Fecha de lanzamiento</label>
                    <input type="date" id="release_date" name="release_date" value="<?=$game->getReleaseDate()?>" required>
                </div>
                <div>
                    <label for="price">Precio (€)</label>
                    <input type="number" min="0" step="0.01" id="price" name="price" value="<?=$game->price?>" required>
                </div>
                <div>
                    <label for="iva">IVA (%)</label>
                    <input type="number" min="0" max="21" id="iva" name="iva" value="<?=$game->iva?>" required>
                </div>
                <div>
                    <label for="name">Description:</label>
                    <textarea name="description"><?=$game->description?></textarea>
                </div>
                <div>
                    <label for="stock">Disponible: </label>
                    <input type="checkbox" name="stock" <?= $game->stock ? 'checked' : '' ?>>
                </div>
                <div>
                    <label for="image">Imagen:</label>
                    <input type="file" name="image" accept="image/png">
                    <div>
                        <img style="width:100%; max-width:300px;" src="<?=$game->image?>" alt="Game image">
                    </div>
                </div>
                <input class="btn" type="submit" value="Guardar">
            </form>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <a href="list.php">Cancelar</a>
        <?php endif; ?> 
    </main>
    <?php render_template('parts/footer'); ?>
</body>
</html>