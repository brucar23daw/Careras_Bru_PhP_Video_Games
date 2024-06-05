<!DOCTYPE html>
<html lang="es">
<?php render_template('parts/head', ['title' => 'Tienda de videojuegos']); ?>
<body>
    <?php render_template('parts/navbar'); ?>
    <main>
        <h1>Añadir videojuego</h1>
        <form method="post" action="" enctype="multipart/form-data">
            <div>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="release_date">Fecha de lanzamiento</label>
                <input type="date" id="release_date" name="release_date" required>
            </div>
            <div>
                <label for="price">Precio (€)</label>
                <input type="number" min="0" step="0.01" id="price" name="price" required>
            </div>
            <div>
                <label for="iva">IVA (%)</label>
                <input type="number" min="0" max="21" value="21" id="iva" name="iva" required>
            </div>
            <div>
                <label for="image">Imagen:</label>
                <input type="file" name="image" accept="image/png" required>
            </div>
            <div>
                <label for="name">Description:</label>
                <textarea name="description"></textarea>
            </div>
            <div>
                <label for="stock">Disponible: </label>
                <input type="checkbox" name="stock">
            </div>
            <input type="submit" value="Añadir producto">
        </form>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </main>
    <?php render_template('parts/footer'); ?>
</body>
</html>