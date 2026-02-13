<a name="top"></a>

# 🔩 El patrón Adapter - Guía Completa

Repositorio creado para explicar el patrón **Adapter** y su implementación mediante un ejemplo práctico en **PHP** (Aplicación de inventario).

<br>

## 📖 Tabla de contenidos

<details>
  <summary>Mostrar contenidos</summary>
  <br>
  <ul>
    <li>🔩 <a href="#-el-patrón-adapter">El patrón Adapter</a>
      <ul>
        <li>💡 <a href="#-entendiendo-la-definición">Entendiendo la definición</a></li>
        <li>🛂 <a href="#-elementos-típicos-que-encontramos-en-un-patrón-adapter">Elementos típicos que encontramos en un patrón Adapter</a></li>
        <li>👍🏼 <a href="#-cuándo-usar-el-patrón-adapter">¿Cuándo usar el patrón Adapter?</a></li>
        <li>🎯 <a href="#-principales-beneficios-de-aplicar-el-patrón-adapter">Principales beneficios de aplicar el patrón Adapter</a></li>
      </ul>
    </li>
    <li>🧪 <a href="#-ejemplo-de-implementación-aplicación-de-inventario">Ejemplo de implementación: Aplicación de inventario</a>
      <ul>
        <li>🎡 <a href="#-qué-hace-esta-aplicación-de-ejemplo">¿Qué hace esta aplicación de ejemplo?</a></li>
        <li>👉🏼 <a href="#-identificación-de-los-principales-archivos-del-ejemplo">Identificación de los principales archivos del ejemplo</a></li>
      </ul>
    </li>
    <li>📂 <a href="#-estructura-del-proyecto-y-composer">Estructura del Proyecto y Composer</a></li>
    <li>📋 <a href="#-requisitos">Requisitos</a></li>
    <li>🚀 <a href="#-instalación-y-ejecución">Instalación y Ejecución</a></li>
  </ul>
</details>

---

<br>

## 🔩 El patrón Adapter

El patrón Adapter es un patrón **estructural** que permite que una **aplicación** utilice un **servicio** con una **interfaz incompatible**, introduciendo una capa intermedia o **adaptador** que traduce la forma de uso del servicio a la **interfaz que la aplicación espera**.

Este patrón propone la creación de una `Interface Target` que define la forma de uso del servicio que la aplicación espera, y que es implementada por la clase `Adapter`, quien "envuelve" al servicio incompatible y lo adapta a la interfaz que la aplicación espera.

<br>

### 💡 Entendiendo la definición

Para que una aplicación funcione, ésta **necesita interactuar con diferentes servicios**, los cuales, si son externos, **pueden tener interfaces incompatibles** con las que espera la aplicación.

Aquí, por interfaz no entendemos una Interface propiamente dicha, sino algo más general, una manera concreta de interactuar con un determinado servicio.

Como normalmente la aplicación no puede acceder al código de ese servicio externo para adaptarlo a sus necesidades, lo que propone este patrón es crear una **estructura intermedia** que, sin cambiar ni la aplicación ni el servicio externo, permita que ambos puedan interactuar entre sí.

Dicha estructura intermedia, según la definición más pura de este patrón consiste en la creación de dos elementos que haran de "puente" entre la aplicación y el servicio incompatible: una **`Interface Target`** y una clase **`Adapter`**.

1️⃣ **`Interface Target`**: define la **forma de uso del servicio que la aplicación espera** y conoce (se crea dentro de la propia aplicación y forma parte de ella).

Como es una `Interface`, sólo declara el método o métodos a los que la aplicación va a **"apuntar"** (de ahí lo de Target u objetivo) para obtener lo que necesita del servicio. Por tanto, la aplicación no conoce al servicio incompatible, sólo conoce a la `Interface Target`.

2️⃣ **Clase `Adapter`**: implementa la `Interface Target` y **"envuelve"** o usa el servicio incompatible, **adaptándolo a esa interfaz** que la aplicación espera.

Este adaptador también se crea dentro de la propia aplicación y forma parte de ella.

Dentro de dicho adaptador:
- se encuentra una **propiedad que contendrá una instancia del servicio incompatible**,
- se **implementan los métodos declarados en la `Interface Target`**, que quedan a "disposición" de la aplicación, y que internamente están **llamando al servicio incompatible**, haciendo de **"traductor" o "intermediario"** entre la aplicación y el servicio incompatible.

### 🧩 Elementos típicos que encontramos en un patrón Adapter

1️⃣  **Cliente o Aplicación que necesita el servicio**: es la aplicación en sí, que necesita obtener algo de un servicio externo. Ya existe y no se pretende modificar.

2️⃣ **Servicio externo incompatible**: es el servicio externo que la aplicación necesita, pero que tiene una interfaz o forma de acceder incompatible con la que espera la aplicación. Suele ser algo que ya existe previamente y normalmente no se puede modificar porque a menudo suele ser un servicio de terceros.

3️⃣ **Interface Target**: define la forma en la que la aplicación espera utilizar el servicio. Esta interface se crea dentro de la propia aplicación y forma parte de ella. Se debe crear expresamente, según indica el patrón, o al menos, debe existir previamente (como el caso del ejemplo de este repositorio).

4️⃣ **Adaptador**: es la clase que hace de estructura intermedia que permite que la aplicación y el servicio incompatible puedan interactuar entre sí. Implementa la Interface Target y envuelve o usa el servicio incompatible. Es una clase que se crea expresamente, según indica el patrón.

<br>

### 👍🏼 ¿Cuándo usar el patrón Adapter?

#### 📌 Adaptabilidad

Utiliza la clase adaptadora cuando quieras usar una clase existente, pero cuya interfaz no sea compatible con el resto del código.

El patrón Adapter te permite crear una clase intermedia que sirva como traductora entre tu código y una clase heredada, una clase de un tercero o cualquier otra clase con una interfaz extraña.

#### 📌 Extensión

Utiliza el patrón cuando quieras reutilizar varias subclases existentes que carezcan de alguna funcionalidad común que no pueda añadirse a la superclase.

Aplicando este patrón, puedes colocar la funcionalidad que falta dentro de una clase adaptadora. Después puedes envolver objetos a los que les falten funciones, dentro de la clase adaptadora, obteniendo esas funciones necesarias de un modo dinámico. Para que esto funcione, las clases en cuestión deben tener una interfaz común y el campo de la clase adaptadora debe seguir dicha interfaz.

<br>

### 🎯 Principales beneficios de aplicar el patrón Adapter

#### 📌 SOLID

Aplicando este patrón se están siguiendo los principios de solid:

- **Single Responsibility**: cada adaptador tiene una única responsabilidad.
- **Open/Closed**: integramos servicios externos sin modificar el código de la aplicación.
- **Liskov Substitution**: cualquier clase que implemente la interface target puede ser usada en cualquier lugar donde se espera una implementación de la interface target.
- **Interface Segregation**: la interface target es una interface pequeña y específica, que sólo contiene los métodos que los adaptadores necesitan.
- **Dependency Inversion**: la aplicación depende de interfaces y no de implementaciones.

#### 📌 P.O.O.

- **Abstracción**: la interface target es una abstracción que define la forma en que se debe usar el adaptador, mientras que los adaptadores son las implementaciones concretas de la interface target.
- **Polimorfismo**: diferentes objetos responden a un mismo método `getProductList()` de formas diferentes.


<br>

[🔝](#top)

---

<br>

## 🧪 Ejemplo de implementación: Aplicación de inventario

### 🎡 ¿Qué hace esta aplicación de ejemplo?

Imagina que tenemos una aplicación de inventario que, a partir de la obtención de una lista de productos, genera algún tipo de reporte o resultado, eliminando los productos que no tienen stock, listándolos con sus cantidades y costes, y obteniendo el valor total de las existencias.

#### 🖐🏻 Lo que ya existe

En nuestro ejemplo, esto es lo que hace la clase `InventoryApp`.

Esta clase obtiene el listado de los productos de un servicio interno, representado en la clase `InternalProductService`, y que, para una mejor comprensión del ejemplo, está implementando una Interface que ya tenemos creada en el proyecto, llamada `ProductListProvider` (esa es la `Interface Target` que venimos diciendo que la aplicación espera y conoce).

Sin embargo, **nuestra aplicación podría querer trabajar con otros servicios** que le proporcionen listas de productos, pero éstos podrían tener formas de obtener los productos diferentes o incompatibles con la que espera la aplicación.

Es el caso de los servicios externos A y B, representados en las clases `ExternalServiceA` y `ExternalServiceB`. El primero de ellos devuelve los datos en el formato que espera la aplicación (un array de objetos), mientras que el segundo devuelve los datos en un formato incompatible con la que espera la aplicación (un array de arrays).

Pero **ambos servicios "trabajan" de forma diferente a como nuestra aplicación espera**, por lo que **no podemos usarlos directamente**.

#### 👉🏼 Lo que debemos añadir

Para poder usarlos, el **patrón Adapter** nos propone crear una estructura intermedia, consistente en crear una `Interface Target` que entienda la aplicación, y una o varias clases `Adapter`, que sirvan de "intermediarias" entre la aplicación y los servicios externos.

Como la `Interface Target` ya la teníamos creada de inicio en nuestra aplicación, no hay que crear ninguna más. Esa es la `Interface` que nos servirá de referencia para crear los diferentes adaptadores.

Sólo nos queda **crear los adaptadores necesarios**, concretamente uno para el servicio externo A y otro para el servicio externo B, puesto que son diferentes entre sí y no nos sirve un mismo adaptador para ambos. Estos adaptadores también se crean dentro de la aplicación, y en nuestro ejemplo son las clases `AdapterExternalServiceA` y `AdapterExternalServiceB`.

Cada uno de dichos adaptadores recibirá, por inyección de dependencias, una instancia del servicio incompatible correspondiente para poder usarlo en su interior, y a su vez, implementará **a su manera** la `Interface Target` para comunicar a la aplicación con el servicio correspondiente.

#### 👌🏼 Cómo funciona en conjunto

En el flujo de la aplicación que se muestra en el archivo main.php podemos ver cómo se crea una instancia de la clase `InventoryApp` y esta es capaz de trabajar indistintamente con el servicio interno o con cualquiera de los servicios externos, gracias a los adaptadores.

En el caso del servicio interno, le pasamos la instancia de la clase `InternalProductService` al método `getInventoryReport()` de la clase `InventoryApp`.

En el caso de los servicios externos, le pasamos la instancia del adaptador correspondiente a la aplicación, por ejemplo, en el caso del servicio externo A, le pasamos la instancia de la clase `AdapterExternalServiceA` al método `getInventoryReport()` de la clase `InventoryApp`.

<br>

> **🚨 DETALLE IMPORTANTE**
> Dentro de nuestra aplicación, en la clase **`InventoryApp`**, el método **`getInventoryReport()`**, que es el "corazón" de la aplicación y que realiza todo el trabajo una vez que dispone de la lista de productos, espera como parámetro una instancia de la clase **`ProductListProvider`**, es decir, de la **`Interface Target`**, o mejor dicho, espera una instancia de cualquier clase que la implemente, ya sea de la clase **`InternalProductService`** o de cualquiera de los adaptadores que se creen para los servicios externos (**`AdapterExternalServiceA`** o **`AdapterExternalServiceB`**).

### 👉🏼 Identificación de los principales archivos del ejemplo

#### 📁 Carpeta app

###### 📁 Carpeta Core: el núcleo de la aplicación

 - `InventoryApp`: la que contiene el "corazón" de la aplicación y que realiza todo el trabajo una vez que dispone de la lista de productos.
  - `ProductListProvider`: nuestra Interface Target, la que conoce y espera nuestra aplicación y la que deben implementar los adaptadores
 - `InternalProductService`: que representa un servicio interno e implementa la Interface Target `ProductListProvider`.
 - `Product`: define la estructura de los productos que puede manejar nuestra aplicación.

###### 📁 Carpeta Adapters: los adaptadores

 - `AdapterExternalServiceA`: representa un adaptador para el servicio externo A.
 - `AdapterExternalServiceB`: representa un adaptador para el servicio externo B.

#### 📁 Carpeta Services: los servicios externos

##### 📁 Carpeta Service A
 - `ExternalServiceA`: representa un servicio externo A, que devuelve los datos en el formato que espera la aplicación (un array de objetos), pero trabaja de forma diferente a lo que espera nuestra aplicación porque utiliza un método llamado `getProductsFromServiceA()`.

##### 📁 Carpeta Service B
 - `ExternalServiceB`: representa un servicio externo B, que devuelve los datos en un formato incompatible con la que espera la aplicación (un array de arrays), y trabaja de forma diferente a lo que espera nuestra aplicación porque utiliza un método llamado `getProductsFromServiceB()`.


#### ➡️ Flujo de ejecución

Ubicado en la raíz del proyecto: `main.php`:

#### 🎞️ Visualización de resultados

Interfaz visual para comparar los resultados.

Ubicado en la raíz del proyecto: `index.php` y `styles.css`: 

<br>

[🔝](#top)

---

<br>

## 📂 Estructura del Proyecto y Composer

### 1. Organización del código en `src/`

Para mantener el orden hemos movido todo el código fuente a la carpeta `src/`.

Dado que en este ejemplo se están simulando también dos servicios externos, se han dividido los archivos del ejemplo en dos carpetas:

- `app/`: contiene el código de nuestra aplicación.
- `services/`: contiene el código de los servicios externos.

### 2. Autocarga con Composer (PSR-4)

En lugar de tener una lista interminable de `require_once "archivo.php"` en nuestro `main.php`, utilizamos **Composer** para la carga automática de clases.

El archivo `composer.json` define el mapeo:
```json
{
    "autoload": {
        "psr-4": {
            "App\\": "src/app/",
            "ExternalA\\": "src/services/service-a/",
            "ExternalB\\": "src/services/service-b/"
        }
    }
}
```

Esto significa que cualquier clase con el namespace que empiece por `App\` será buscada automáticamente dentro de la carpeta `src/app`. Por ejemplo, la clase InventoryApp estará en el namespace `App\Core` y se buscará en `src/app/Core`.

En este proyecto se añaden, además, en el autoloader, los namespaces de los servicios externos, ExternalA y ExternalB, que se encuentran en la carpeta `src/services/`.

Gracias a esto, en nuestro `main.php` solo necesitamos una línea para cargar TODO el proyecto:
```php
require "vendor/autoload.php";
```

<br>

[🔝](#top)

---

<br>

## 📋 Requisitos

- **PHP 8.0** o superior.
- **[Composer](https://getcomposer.org/)**: Necesario para generar el mapa de clases (autoload).

<br>

## 🚀 Instalación y Ejecución

### 1. Instalación

1.  Clona este repositorio o descarga los archivos.
2.  Abre una terminal en la carpeta raíz del proyecto.
3.  Ejecuta el siguiente comando para generar la carpeta `vendor` y el autoloader:

    ```bash
    composer dump-autoload
    ```
    > 💡 **Nota**: Como este proyecto no tiene dependencias de librerías externas (solo usamos Composer para el autoload), basta con `composer dump-autoload`. Si hubiera librerías en `require`, usaríamos `composer install`.

### 2. Ejecución

Puedes ejecutar/visualizar la aplicación mediante el **navegador** (con XAMPP o con un servidor web local).

#### 🌐 Para ejecutarlo mediante XAMPP:

1. Mueve la carpeta del proyecto a la carpeta htdocs (o equivalente según la versión de XAMPP y sistema operativo que uses).
2. Arranca XAMPP.
3. Accede a index.php desde tu navegador (por ejemplo: http://localhost/patrones/adapter/index.php)

#### 🌐 Para ejecutarlo usando el servidor web interno de PHP

PHP trae un servidor web ligero que sirve para desarrollo. No necesitas instalar Apache ni XAMPP.

1. Abre la terminal y navega a la carpeta de tu proyecto:

```bash
cd ~/Documentos/.../patrones/adapter
```
2. Dentro de esa ubicación, ejecuta:

```bash
php -S localhost:8000
```

>💡 No es obligatorio usar el puerto 8000, puedes usar el que desees, por ejemplo, el 8001.

Con esto, lo que estás haciendo es crear un servidor web php (cuya carpeta raíz es la carpeta seleccionada), que está escuchando en el puerto 8000 (o en el que hayas elegido).

>💡 Si quisieras, podrías crear simultáneamente tantos servidores como proyectos tengas en tu ordenador, siempre y cuando cada uno estuviera escuchando en un puerto diferente (8001, 8002, ...).

3. Ahora, abre tu navegador y accede a http://localhost:8000

Ya podrás visualizar el documento index.php con toda la información del ejemplo.

>💡 No es necesario indicar `http://localhost:8000/index.php` porque el servidor va a buscar dentro de la carpeta raíz (en este caso, en Documentos/.../patrones/adapter), un archivo index.php o index.html de forma automática. Si existe, lo sirve como página principal.
>
> Por eso, estas dos URLs funcionan igual:
>
> http://localhost:8000
>
> http://localhost:8000/index.php


<br>

[🔝](#top)