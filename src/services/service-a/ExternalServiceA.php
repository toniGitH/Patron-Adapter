<?php

namespace ExternalA;

use App\Core\Product;

/**
 * Servicio Externo "A": Código INVARIABLE de terceros.
 */
class ExternalServiceA
{
    /**
     * Devuelve una lista de productos en el formato nativo de la aplicación.
     * Aunque es un servicio externo, en este caso ya devuelve objetos Product.
     * 
     * @return Product[]
     */
    public function getProductsFromServiceA(): array
    {
        return [
            new Product('EXT-A1', 'Monitor Dell 27"', 350.50, 5),
            new Product('EXT-A2', 'Altavoces Bose', 199.00, 8),
            new Product('EXT-A3', 'Ratón Logitech MX', 85.00, 0), // Sin stock
            new Product('EXT-A4', 'Teclado Gamer', 120.00, 12),
            new Product('EXT-A5', 'Webcam 1080p', 65.00, 20),
            new Product('EXT-A6', 'Soporte Monitor', 45.00, -2), // Sin stock
        ];
    }
}
