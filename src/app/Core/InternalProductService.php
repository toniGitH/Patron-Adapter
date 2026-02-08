<?php

namespace App\Core;

/**
 * Servicio interno de la propia aplicación.
 * Implementa la interface ProductListProvider (Target) para demostrar que tanto la
 * lógica nativa (esta clase) como la adaptada pueden ser tratadas de forma unificada.
 */
class InternalProductService implements ProductListProvider
{
    /**
     * Devuelve un listado de productos en el formato nativo de la app (objetos Product).
     * Implementa la interfaz ProductProvider para permitir el uso polimórfico.
     * 
     * @return Product[]
     */
    public function getProducts(): array
    {
        return [
            new Product('INT-001', 'Batería de Litio Pro', 45.00, 10),
            new Product('INT-002', 'Cargador USB-C', 29.99, 15),
            new Product('INT-003', 'Cable USB-C 2m', 12.50, 0), // Sin stock
            new Product('INT-004', 'Funda Silicona', 15.00, 25),
            new Product('INT-005', 'Protector Pantalla', 9.99, 50),
            new Product('INT-006', 'Adaptador Jack 3.5', 7.50, -5), // Sin stock (negativo)
        ];
    }
}
