# rcc-client-php

Este reporte muestra el historial crediticio, el cumplimiento de pago de los compromisos que la persona ha adquirido con entidades financieras, no financieras e instituciones comerciales que dan crédito o participan en actividades afines al crédito.

## Requisitos

PHP 7.1 ó superior
### Dependencias adicionales
- Se debe contar con las siguientes dependencias de PHP:
    - ext-curl
    - ext-mbstring
- En caso de no ser así, para linux use los siguientes comandos
```sh
#ejemplo con php en versión 7.3 para otra versión colocar php{version}-curl
apt-get install php7.3-curl
apt-get install php7.3-mbstring
```
- Composer [vea como instalar][1]
## Instalación

Ejecutar: `composer install`
## Guía de inicio
### Paso 1. Generar llave y certificado
- Se tiene que tener un contenedor en formato PKCS12.
- En caso de no contar con uno, ejecutar las instrucciones contenidas en **lib/Interceptor/key_pair_gen.sh** ó con los siguientes comandos.
- **opcional**: Para cifrar el contenedor, colocar una contraseña en una variable de ambiente.
```sh
export KEY_PASSWORD=your_password
```
- Definir los nombres de archivos y alias.
```sh
export PRIVATE_KEY_FILE=pri_key.pem
export CERTIFICATE_FILE=certificate.pem
export SUBJECT=/C=MX/ST=MX/L=MX/O=CDC/CN=CDC
export PKCS12_FILE=keypair.p12
export ALIAS=circulo_de_credito
```
- Generar llave y certificado.
```sh
#Genera la llave privada.
openssl ecparam -name secp384r1 -genkey -out ${PRIVATE_KEY_FILE}
#Genera el certificado público.
openssl req -new -x509 -days 365 \
    -key ${PRIVATE_KEY_FILE} \
    -out ${CERTIFICATE_FILE} \
    -subj "${SUBJECT}"
```
- Generar contenedor en formato PKCS12.
```sh
# Genera el archivo pkcs12 a partir de la llave privada y el certificado.
# Deberá empaquetar la llave privada y el certificado.
openssl pkcs12 -name ${ALIAS} \
    -export -out ${PKCS12_FILE} \
    -inkey ${PRIVATE_KEY_FILE} \
    -in ${CERTIFICATE_FILE} -password pass:${KEY_PASSWORD}
```
### Paso 2. Cargar el certificado dentro del portal de desarrolladores
 1. Iniciar sesión.
 2. Dar clic en la sección "**Mis aplicaciones**".
 3. Seleccionar la aplicación.
 4. Ir a la pestaña de "**Certificados para @tuApp**".
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/applications.png">
    </p>
 5. Al abrirse la ventana emergente, seleccionar el certificado previamente creado y dar clic en el botón "**Cargar**":
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/upload_cert.png" width="268">
    </p>
### Paso 3. Descargar el certificado de Círculo de Crédito dentro del portal de desarrolladores
 1. Iniciar sesión.
 2. Dar clic en la sección "**Mis aplicaciones**".
 3. Seleccionar la aplicación.
 4. Ir a la pestaña de "**Certificados para @tuApp**".
    <p align="center">
        <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/applications.png">
    </p>
 5. Al abrirse la ventana emergente, dar clic al botón "**Descargar**":
    <p align="center">
        <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/download_cert.png" width="268">
    </p>
 > Es importante que este contenedor sea almacenado en la siguiente ruta:
 > **/path/to/repository/lib/Interceptor/keypair.p12**
 >
 > Así mismo el certificado proporcionado por círculo de crédito en la siguiente ruta:
 > **/path/to/repository/lib/Interceptor/cdc_cert.pem**
- En caso de que no se almacene así, se debe especificar la ruta donde se encuentra el contenedor y el certificado. Ver el siguiente ejemplo:
```php
$password = getenv('KEY_PASSWORD');
$this->signer = new \APIHub\Client\Interceptor\KeyHandler(
    "/example/route/keypair.p12",
    "/example/route/cdc_cert.pem",
    $password
);
```
 > **NOTA:** Sólamente en caso de que el contenedor haya cifrado, se debe colocar la contraseña en una variable de ambiente e indicar el nombre de la misma, como se ve en la imagen anterior.
### Paso 4. Modificar URL
 Modificar la URL de la petición en ***lib/Configuration.php*** en la línea 19, como se muestra en el siguiente fragmento de código:
 ```php
 protected $host = 'the_url';
 ```
### Paso 5. Capturar los datos de la petición

Es importante contar con el setUp() que se encargará de firmar y verificar la petición.
```php
<?php
public function setUp()
{
    $password = getenv('KEY_PASSWORD');
    $this->signer = new \APIHub\Client\Interceptor\KeyHandler(null, null, $password);
}    
```
```php
<?php

public function testGetReporte()
    {

        $events = new \APIHub\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = handlerStack::create();    
        $handler->push($events->add_signature_header('x-signature'));

        $handler->push($events->verify_signature_header('x-signature'));
        $client = new \GuzzleHttp\Client([
            'handler' => $handler,
            'verify' => false
        ]); 

        $this->apiInstance = new \APIHub\Client\Api\ReporteDeCrditoApi($client);

        $x_api_key = "your_api_key";
        $username = "your_username";
        $password = "your_password";

        $request = new \APIHub\Client\Model\PersonaPeticion();
        $request->setPrimerNombre("XXXXXXXXXX");
        $request->setSegundoNombre(null);
        $request->setApellidoPaterno("XXXXXXXXXX");
        $request->setApellidoMaterno("XXXXXXXXXX");
        $request->setApellidoAdicional(null);
        $request->setFechaNacimiento("YYYY-MM-DD");
        $request->setRfc("XXXXXXXXXX");
        $request->setCurp(null);

        $domicilio = new \APIHub\Client\Model\Domicilio();
        $domicilio->setDireccion("XXXXXXXXXX");
        $domicilio->setColonia("XXXXXXXXXX");
        $domicilio->setCiudad("XXXXXXXXXX");
        $domicilio->setCodigoPostal("XXXXXXXXXX");
        $domicilio->setMunicipio("XXXXXXXXXX");
        $domicilio->setEstado("XXX");
        $request->setDomicilio($domicilio);

        try {
            $result = $this->apiInstance->getReporte($x_api_key, $username, $password, $request);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getFolioConsulta()!==null);
            return $result->getFolioConsulta();
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }
?>
```
## Pruebas unitarias

Para ejecutar las pruebas unitarias:
```sh
./vendor/bin/phpunit
```
[1]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
