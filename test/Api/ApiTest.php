 <?php

namespace RCC\MX\Client;

use \GuzzleHttp\Client;
use \GuzzleHttp\HandlerStack as handlerStack;

use Signer\Manager\ApiException;
use Signer\Manager\Interceptor\MiddlewareEvents;
use Signer\Manager\Interceptor\KeyHandler;

use \RCC\MX\Client\ObjectSerializer;
use \RCC\MX\Client\Api\RCCApi as Instance;
use \RCC\MX\Client\Configuration;
use \RCC\MX\Client\Model\Error;
use \RCC\MX\Client\Model\CatalogoEstados;
use \RCC\MX\Client\Model\PersonaPeticion;
use \RCC\MX\Client\Model\DomicilioPeticion;

class ReporteDeCrditoApiTest extends \PHPUnit_Framework_TestCase
{   
    public function setUp()
    {
        $config = new Configuration();
        $config->setHost('the_url');
        $password = getenv('KEY_PASSWORD');
        $this->signer = new KeyHandler(null, null, $password);
        $events = new MiddlewareEvents($this->signer);
        $handler = HandlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));
        $handler->push($events->verify_signature_header('x-signature'));
        $client = new Client(['handler' => $handler]);
        $this->apiInstance = new Instance($client, $config);
        $this->x_api_key = "your_api_key";
        $this->username = "your_username";
        $this->password = "your_password";
    }

    public function testGetReporte()
    {
        

        $estado = new CatalogoEstados();
        $request = new PersonaPeticion();

        $request->setPrimerNombre("JUAN");
        $request->setApellidoPaterno("PRUEBA");
        $request->setApellidoMaterno("SIETE");
        $request->setFechaNacimiento("1980-01-07");
        $request->setRfc("PUAC800107");
        $request->setNacionalidad("MX");

        $dom = new DomicilioPeticion();
        $dom->setDireccion("INSURGENTES SUR 1001");
        $dom->setColoniaPoblacion("INSURGENTES SUR");
        $dom->setDelegacionMunicipio("CIUDAD DE MEXICO");
        $dom->setCiudad("CIUDAD DE MEXICO");
        $dom->setEstado($estado::DF);
        $dom->setCP("11230");

        $request->setDomicilio($dom);

        try {
            $result = $this->apiInstance->getReporte($this->x_api_key, $this->username, $this->password, $request);
            $this->assertTrue($result->getFolioConsulta()!==null);
            print_r($result);            
            echo "testGetReporte finished\n";
            return $result->getFolioConsulta();
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }

}

