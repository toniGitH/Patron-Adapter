<?php require_once 'main.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Adapter - Demo Triple Origen</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="main-header">
                <h1>InventoryApp</h1>

                <div class="header-grid">
                    <!-- Intro Card -->
                    <div class="intro-card">
                        <div class="intro-icon">📋</div>
                        <div class="intro-content">
                            <p><b>Aplicación de Inventario que:</b></p>
                            <ul class="intro-list">
                                <li><b>Recibe</b> una lista de productos.</li>
                                <li><b>Filtra</b> existencias (stock > 0).</li>
                                <li><b>Lista</b> resultados de forma unificada.</li>
                                <li><b>Calcula</b> el valor total del inventario.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="sources-panel">
                        <p class="panel-label">Posibles orígenes de datos</p>
                        <div class="sources-list column">
                            <div class="source-item">
                                <span class="source-icon">🏠</span>
                                <div class="source-info">
                                    <span class="source-name">InternalProductService</span>
                                    <span class="source-type">Nativo</span>
                                </div>
                            </div>
                            <div class="source-item">
                                <span class="source-icon">🌐</span>
                                <div class="source-info">
                                    <span class="source-name">ExternalServiceA</span>
                                    <span class="source-type">Externo <span class="warning-tag">No modificable</span></span>
                                </div>
                            </div>
                            <div class="source-item">
                                <span class="source-icon">🌐</span>
                                <div class="source-info">
                                    <span class="source-name">ExternalServiceB</span>
                                    <span class="source-type">Externo <span class="warning-tag">No modificable</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </header>

        <div class="grid">
            <!-- Columna 1: Origen Interno -->
            <section class="card">
                <div class="card-header">
                    <span class="card-icon">🏠</span>
                    <h2>Origen de datos interno (App)</h2>
                    <span class="badge badge-internal">Lógica interna</span>
                </div>
                <p class="card-desc">
                    Lógica nativa de la aplicación. Gestiona su propio stock y modelo de datos sin necesidad de adaptaciones.
                </p>
                <div class="table-container">
                    <table class="inventory-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($internalReport['products'] as $p): ?>
                            <tr>
                                <td>
                                    <div class="p-name"><?php echo $p->nombre; ?></div>
                                    <div class="p-id"><?php echo $p->id; ?></div>
                                </td>
                                <td><?php echo number_format($p->precio, 2); ?>€</td>
                                <td><?php echo $p->stock; ?></td>
                                <td class="p-subtotal"><?php echo number_format($p->precio * $p->stock, 2); ?>€</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="total-section">
                    <span>Valor Total</span>
                    <span><?php echo number_format($internalReport['totalCost'], 2); ?>€</span>
                </div>
            </section>

            <!-- Columna 2: Origen Externo Compatible -->
            <section class="card">
                <div class="card-header">
                    <span class="card-icon">🌐</span>
                    <h2>Origen de datos externo (A)</h2>
                    <span class="badge badge-compatible">Patrón Adapter</span>
                </div>
                <p class="card-desc">
                    Servicio externo con formato compatible. El <strong>AdapterExternalServiceA</strong> solo se encarga de cumplir el contrato de la interfaz.
                </p>
                <div class="table-container">
                    <table class="inventory-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($serviceAReport['products'] as $p): ?>
                            <tr>
                                <td>
                                    <div class="p-name"><?php echo $p->nombre; ?></div>
                                    <div class="p-id"><?php echo $p->id; ?></div>
                                </td>
                                <td><?php echo number_format($p->precio, 2); ?>€</td>
                                <td><?php echo $p->stock; ?></td>
                                <td class="p-subtotal"><?php echo number_format($p->precio * $p->stock, 2); ?>€</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="total-section">
                    <span>Valor Total</span>
                    <span><?php echo number_format($serviceAReport['totalCost'], 2); ?>€</span>
                </div>
            </section>

            <!-- Columna 3: Origen Externo Incompatible -->
            <section class="card">
                <div class="card-header">
                    <span class="card-icon">🌐</span>
                    <h2>Origen de datos externo (B)</h2>
                    <span class="badge badge-adapted">Patrón Adapter</span>
                </div>
                <p class="card-desc">
                    Servicio externo con formato incompatible. El <strong>AdapterExternalServiceB</strong> cumple el contrato y transforma los datos al modelo interno.
                </p>
                <div class="table-container">
                    <table class="inventory-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($serviceBReport['products'] as $p): ?>
                            <tr>
                                <td>
                                    <div class="p-name"><?php echo $p->nombre; ?></div>
                                    <div class="p-id"><?php echo $p->id; ?></div>
                                </td>
                                <td><?php echo number_format($p->precio, 2); ?>€</td>
                                <td><?php echo $p->stock; ?></td>
                                <td class="p-subtotal"><?php echo number_format($p->precio * $p->stock, 2); ?>€</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="total-section">
                    <span>Valor Total</span>
                    <span><?php echo number_format($serviceBReport['totalCost'], 2); ?>€</span>
                </div>
            </section>

            <!-- Conclusión -->
            <section class="conclusion-section">
                <header class="conclusion-header">
                    <h3>Ventajas del uso del Patrón Adapter</h3>
                    <p class="card-desc">Cómo este patrón fortalece la arquitectura siguiendo los estándares actuales.</p>
                </header>

                <!-- Grupo 1: Principios SOLID -->
                <div class="conclusion-group">
                    <h4 class="group-title">Principios SOLID</h4>
                    <div class="conclusion-grid solid-grid">
                        <div class="conclusion-card">
                            <h4><span>S</span> Responsabilidad Única</h4>
                            <p><code>AdapterExternalServiceB</code> tiene la única responsabilidad de transformar el formato de <b>ExternalServiceB</b>. Se separa de <code>InventoryApp</code>, que solo gestiona lógica de negocio.</p>
                        </div>
                        <div class="conclusion-card">
                            <h4><span>O</span> Abierto / Cerrado</h4>
                            <p>Podemos integrar un <b>ExternalServiceC</b> creando un nuevo <code>AdapterExternalServiceC</code> sin necesidad de modificar ni una sola línea de código dentro de la clase <code>InventoryApp</code>.</p>
                        </div>
                        <div class="conclusion-card">
                            <h4><span>L</span> Sustitución de Liskov</h4>
                            <p>Cualquier implementación de <code>ProductListProvider</code> es intercambiable en <code>main.php</code>. La App funciona igual si le pasas el servicio nativo o un adaptador, sin efectos secundarios inesperados.</p>
                        </div>
                        <div class="conclusion-card">
                            <h4><span>I</span> Segregación de Interfaz</h4>
                            <p><code>ProductListProvider</code> es una interfaz "delgada" con un único método (<code>getProducts</code>). Así, los adaptadores no se ven obligados a implementar métodos innecesarios de gestión o facturación.</p>
                        </div>
                        <div class="conclusion-card">
                            <h4><span>D</span> Inversión de Dependencias</h4>
                            <p><code>InventoryApp</code> (alto nivel) no depende de <code>ExternalServiceA</code> (bajo nivel). Ambas dependen de la abstracción <code>ProductListProvider</code>. La App ahora impone sus reglas al mundo exterior.</p>
                        </div>
                        <div class="conclusion-card" style="opacity: 0.5; border-style: dashed; justify-content: center; align-items: center;">
                            <p style="text-align: center; font-style: italic;"><b>Código Limpio y Escalable</b><br>Basado en patrones clásicos.</p>
                        </div>
                    </div>
                </div>

                <!-- Grupo 2: POO -->
                <div class="conclusion-group">
                    <h4 class="group-title">POO</h4>
                    <div class="conclusion-grid">
                        <div class="conclusion-card">
                            <h4><span>🛡️</span> Abstracción y Concreción</h4>
                            <p>La interfaz <code>ProductListProvider</code> es la <b>Abstracción</b> (el "qué"). Las <b>Concreciones</b> son el <code>InternalProductService</code> (fuente nativa), y los adaptadores <code>AdapterExternalServiceA</code> y <code>AdapterExternalServiceB</code> (fuentes externas), que materializan esa idea en código real.</p>
                        </div>
                        <div class="conclusion-card">
                            <h4><span>🤝</span> Polimorfismo Aplicado</h4>
                            <p>Diferentes objetos responden al método <code>getProducts()</code> de formas únicas: el <b>Servicio Interno</b> entrega datos directos, el <b>Adaptador A</b> delega a un servicio compatible, y el <b>Adaptador B</b> transforma datos incompatibles. Para el cliente, la orden es la misma; la ejecución es distinta.</p>
                        </div>
                    </div>
                </div>


            </section>
        </div>
    </div>
</body>
</html>