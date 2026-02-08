<?php

namespace ExternalB;

/**
 * Servicio Externo "B": Código INVARIABLE de terceros.
 * Formato de datos incompatible (array asociativo).
 */
class ExternalServiceB
{
    /**
     * Devuelve una lista de productos con estructura de datos propia e incompatible.
     * 
     * @return array[] Listado de arrays asociativos con claves 'code', 'title', etc.
     */
    public function getProductsFromServiceB(): array
    {
        return [
            ['code' => 'INC-101', 'title' => 'Teclado RGB', 'cost' => 120.00, 'quantity' => 4],
            ['code' => 'INC-102', 'title' => 'Ratón Gamer', 'cost' => 55.00, 'quantity' => 10],
            ['code' => 'INC-103', 'title' => 'Alfombrilla XL', 'cost' => 25.00, 'quantity' => 0], // Sin stock
            ['code' => 'INC-104', 'title' => 'Auriculares 7.1', 'cost' => 89.00, 'quantity' => 7],
            ['code' => 'INC-105', 'title' => 'Micrófono USB', 'cost' => 150.00, 'quantity' => 3],
            ['code' => 'INC-106', 'title' => 'Cable HDMI 2.1', 'cost' => 30.00, 'quantity' => -1], // Sin stock
        ];
    }
}
