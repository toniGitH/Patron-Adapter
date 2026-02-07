<?php

require_once 'ProductListProvider.php';
require_once 'ExternalServiceA.php';

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
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->service->getProductsFromServiceA();
    }
}
