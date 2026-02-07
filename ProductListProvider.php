<?php

require_once 'Product.php';

/**
 * 🎯 EL "TARGET" (OBJETIVO) DEL PATRÓN ADAPTER
 * 
 * Se llama ProductListProvider porque su responsabilidad es proveer
 * la lista completa de productos (en bruto) para que la App la procese.
 */
interface ProductListProvider
{
    /**
     * Obtiene un listado estandarizado de productos.
     * 
     * @return Product[] Colección de objetos de dominio Product.
     */
    public function getProducts(): array;
}
