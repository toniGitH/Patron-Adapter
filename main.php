<?php

require_once 'InventoryApp.php';
require_once 'InternalProductService.php';
require_once 'AdapterExternalServiceA.php';
require_once 'AdapterExternalServiceB.php';
require_once 'ExternalServiceB.php';
require_once 'ExternalServiceA.php';

// === INICIALIZACIÓN DE LA APLICACIÓN === //
$app = new InventoryApp();


// === CASO 1. DATOS QUE PROVIENEN DE LA PROPIA APP (NATIVO) === //

    // 1. Instanciamos el proveedor de lista de productos: interno
$internalService = new InternalProductService();
    // 2. Obtenemos el reporte de productos: el método recibe un objeto que implementa la interfaz ProductListProvider
    // Este método no conoce ni le interesa de donde vienen los datos, solo sabe que implementa la interfaz ProductListProvider
$internalReport = $app->getInventoryReport($internalService);


// === CASO 2. DATOS QUE PROVIENEN DEL SERVICIO EXTERNO A (ADAPTADO) === //

    // 1. Instanciamos el proveedor de lista de productos: externo A (código de terceros que proporciona lista de productos en formato compatible con la app)
$externalServiceA = new ExternalServiceA();
    // 2. Ahora, como el proveedor A es externo y nuestra aplicación no lo conoce, no podemos hacer esto:
    // $serviceAReport = $app->getInventoryReport($externalServiceA);
    // Mi aplicación utiliza un método llamado getInventoryReport() que obtiene los productos de un método llamado getProducts(), que no existe en el servicio externo A
    // Debemos utilizar un adaptador (que creamos en su momento) para convertir el proveedor que nuestra aplicación ESPERE y entienda
    // 3. Instanciamos el adaptador para el servicio externo A
$adapterToServiceA = new AdapterExternalServiceA($externalServiceA);
    // 4. Obtenemos el reporte de productos: el método recibe un objeto que implementa la interfaz ProductListProvider
    // De nuevo, el método es agnóstico al origen de los datos, solo sabe que implementa la interfaz ProductListProvider
$serviceAReport = $app->getInventoryReport($adapterToServiceA);


// === CASO 3. DATOS QUE PROVIENEN DEL SERVICIO EXTERNO B (ADAPTADO) === //

    // 1. Instanciamos el proveedor de lista de productos: externo B (código de terceros que proporciona lista de productos en formato no compatible con la app)
$externalServiceB = new ExternalServiceB();
    // 2. De nuevo, como el proveedor B es externo y nuestra aplicación no lo conoce, no podemos hacer esto:
    // $serviceBReport = $app->getInventoryReport($externalServiceB);
    // Mi aplicación utiliza un método llamado getInventoryReport() que obtiene los productos de un método llamado getProducts(), que no existe en el servicio externo B
    // Debemos utilizar un adaptador (que creamos en su momento) para convertir el proveedor que nuestra aplicación ESPERE y entienda
    // 3. Instanciamos el adaptador para el servicio externo B
$adapterToServiceB = new AdapterExternalServiceB($externalServiceB);
    // 4. Obtenemos el reporte de productos: el método recibe un objeto que implementa la interfaz ProductListProvider
    // De nuevo, el método es agnóstico al origen de los datos, solo sabe que implementa la interfaz ProductListProvider
$serviceBReport = $app->getInventoryReport($adapterToServiceB);
