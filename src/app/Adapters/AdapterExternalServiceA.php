<?php

namespace App\Adapters;

use App\Core\ProductListProvider;
use ExternalA\ExternalServiceA;

/**
 * Adaptador para el Servicio Externo "A".
 */
class AdapterExternalServiceA implements ProductListProvider
{
    /** @var ExternalServiceA Instancia del servicio real */
    private ExternalServiceA $service;

    /**
     * @param ExternalServiceA $service El componente original a adaptar
     */
    public function __construct(ExternalServiceA $service)
    {
        $this->service = $service;
    }

    /**
     * Simplemente delega la llamada al servicio original.
     * @return \App\Core\Product[]
     */
    public function getProducts(): array
    {
        return $this->service->getProductsFromServiceA();
    }
}
