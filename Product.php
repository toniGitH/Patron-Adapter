<?php

/**
 * Modelo de dominio de la Aplicación. 
 * Representa cómo nuestra aplicación entiende los productos.
 */
class Product
{
    /** @var string Identificador único del producto */
    public string $id;
    /** @var string Nombre descriptivo */
    public string $nombre;
    /** @var float Precio unitario en Euros */
    public float $precio;
    /** @var int Cantidad disponible en almacén */
    public int $stock;

    /**
     * Constructor de la clase Product.
     * 
     * @param string $id Identificador único
     * @param string $nombre Nombre del producto
     * @param float $precio Precio base
     * @param int $stock Cantidad inicial (por defecto 0)
     */
    public function __construct(string $id, string $nombre, float $precio, int $stock = 0)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }
}
