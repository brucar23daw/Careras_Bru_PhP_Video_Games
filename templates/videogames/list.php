<!DOCTYPE html>
<html lang="es">
<?php render_template('parts/head', ['title' => 'Tienda de videojuegos']); ?>
<body>
    <?php render_template('parts/navbar'); ?>
    <main>
        <h1>Lista de videojuegos</h1>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Fecha de lanzamiento</th>
                    <th>Imagen</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($games as $index => $game): ?>
                    <tr>
                        <td><?= ($index + 1)?></td>
                        <td><?= $game->name?></td>
                        <td><?= $game->price?>€</td>
                        <td><?= $game->getReleaseDate()?></td>
                        <td>
                            <a href="<?= $game->image?>" target="_blank">
                                <img style="width: 128px;" src="<?= $game->image?>">
                            </a>
                        </td>
                        <td>
                            <a class="btn" href="edit.php?id=<?=$game->id?>">Editar</a>
                            <button class="btn red" type="submit" form="form_<?=$game->id?>">Eliminar</button>
                            <form id="form_<?=$game->id?>" class="hidden" action="delete.php" method="post">
                                <input type="hidden" name="game" value="<?=$game->id?>">
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </main>
    <?php render_template('parts/footer'); ?>
</body>
</html>