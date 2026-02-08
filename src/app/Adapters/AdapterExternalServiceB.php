<?php

namespace App\Adapters;

use App\Core\ProductListProvider;
use App\Core\Product;
use ExternalB\ExternalServiceB;

/**
 * Adaptador para el servicio ExternalServiceB.
 */
class AdapterExternalServiceB implements ProductListProvider
{
    /** @var ExternalServiceB Instancia del servicio incompatible */
    private ExternalServiceB $externalService;

    /**
     * @param ExternalServiceB $externalService El componente incompatible a adaptar
     */
    public function __construct(ExternalServiceB $externalService)
    {
        $this->externalService = $externalService;
    }

    /**
     * Implementa la adaptación transformando el array asociativo a objetos Product.
     * 
     * @return Product[]
     */
    public function getProducts(): array
    {
        $externalData = $this->externalService->getProductsFromServiceB();
        
        $products = [];
        foreach ($externalData as $item) {
            $products[] = new Product(
                $item['code'],
                $item['title'],
                (float)$item['cost'],
                (int)$item['quantity']
            );
        }
        return $products;
    }
}
