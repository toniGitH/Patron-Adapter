<?php

namespace App\Core;

/**
 * Clase InventoryApp.
 * Gestiona el inventario: filtrado de stock y cálculo de costes totales.
 */
class InventoryApp
{
    /**
     * Filtra los productos que tienen stock positivo.
     * @param Product[] $products
     * @return Product[]
     */
    public function validateProducts(array $products): array
    {
        return array_filter($products, fn($p) => $p->stock > 0);
    }

    /**
     * Calcula el coste total de una lista de productos (precio * stock).
     * @param Product[] $products
     * @return float
     */
    public function calculateTotalCost(array $products): float
    {
        return array_reduce($products, fn($total, $p) => $total + ($p->precio * $p->stock), 0.0);
    }

    /**
     * Este método es "agnóstico" al origen de los datos. Solo sabe disparar contra el Target getProducts().
     * Encapsula todo el flujo: obtención -> filtrado -> cálculo.
     * 
     * ⚠️ NOTA IMPORTANTE:
     * Este método puede recibir CUALQUIER OBJETO de CUALQUIER CLASE, siempre y cuando dicha clase implemente la interface 'ProductListProvider'.
     * Esto es lo que permite el polimorfismo y el desacoplamiento total en el patrón Adapter.
     * 
     * @param ProductListProvider $provider El proveedor de datos (puede ser nativo o un adaptador)
     * @return array{products: Product[], totalCost: float} Reporte con lista validada y coste total para que lo use el index.php
     */
    public function getInventoryReport(ProductListProvider $provider): array
    {
        $rawProducts = $provider->getProducts();
        $validatedProducts = $this->validateProducts($rawProducts);
        $totalCost = $this->calculateTotalCost($validatedProducts);

        return [
            'products' => $validatedProducts,
            'totalCost' => $totalCost
        ];
    }
}
