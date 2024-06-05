<?php

class Videogame {
    public string $id;
    public string $name;
    public string $description;
    public float $price;
    public string $image;
    public int $release;
    public float $iva;
    public bool $stock;

    public function __construct($name = '', $description = '', $price = 0) {
        $this->id = uniqid();
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = false;
        $this->iva = 21;
    }

    public function getReleaseDate() {
        return date('Y-m-d', $this->release);
    }
}

$videojuegos = [
    [
        'id' => 1,
        'nombre' => 'The Legend of Zelda: Breath of the Wild',
        'descripcion' => 'Un juego de acción y aventura en un vasto mundo abierto.',
        'precio' => 59.99,
        'imagen' => '../images/zelda.jpg',
        'fecha_lanzamiento' => '2017-03-03'
    ],
    [
        'id' => 2,
        'nombre' => 'Super Mario Odyssey',
        'descripcion' => 'Un juego de plataformas en 3D con Mario.',
        'precio' => 49.99,
        'imagen' => '../images/mario.jpg',
        'fecha_lanzamiento' => '2017-10-27'
    ],
    // Añade más videojuegos aquí
];
?>
