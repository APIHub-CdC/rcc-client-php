<?php

namespace APIHub\Client;

use \GuzzleHttp\Client;
use \GuzzleHttp\Event\Emitter;
use \GuzzleHttp\Middleware;
use \GuzzleHttp\HandlerStack as handlerStack;

use \APIHub\Client\ApiException;
use \APIHub\Client\Configuration;
use \APIHub\Client\Model\Error;
use \APIHub\Client\Interceptor\KeyHandler;
use \APIHub\Client\Interceptor\MiddlewareEvents;

class ReporteDeCrditoApiTest extends \PHPUnit_Framework_TestCase
{   
    public function setUp()
    {
        $password = getenv('KEY_PASSWORD');
        $this->signer = new \APIHub\Client\Interceptor\KeyHandler(null, null, $password);
    }

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

    /**
     * @depends testGetReporte
     */
    public function testGetConsultas($folioConsulta)
    {
        $events = new \APIHub\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = handlerStack::create();  
        $handler->push($events->add_signature_header_from_folio_consulta('x-signature', $folioConsulta));

        $handler->push($events->verify_signature_header('x-signature'));
        $client = new \GuzzleHttp\Client([
            'handler' => $handler,
            'verify' => false
        ]); 

        $this->apiInstance = new \APIHub\Client\Api\ReporteDeCrditoApi($client);
        $x_api_key = "your_api_key";
        $username = "your_username";
        $password = "your_password";

        try {
            $result = $this->apiInstance->getConsultas($folioConsulta, $x_api_key, $username, $password);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getConsultas()!==null);
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
        
    }
    
    /**
     * @depends testGetReporte
     */
    public function testGetCreditos($folioConsulta)
    {
        $events = new \APIHub\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = handlerStack::create();  
        $handler->push($events->add_signature_header_from_folio_consulta('x-signature', $folioConsulta));

        $handler->push($events->verify_signature_header('x-signature'));
        $client = new \GuzzleHttp\Client([
            'handler' => $handler,
            'verify' => false
        ]); 

        $this->apiInstance = new \APIHub\Client\Api\ReporteDeCrditoApi($client);
        $x_api_key = "your_api_key";
        $username = "your_username";
        $password = "your_password";

        try {
            $result = $this->apiInstance->getCreditos($folioConsulta, $x_api_key, $username, $password);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getCreditos()!==null);
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }
    
    /**
     * @depends testGetReporte
     */
    public function testGetDomicilios($folioConsulta)
    {
        $events = new \APIHub\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = handlerStack::create();  
        $handler->push($events->add_signature_header_from_folio_consulta('x-signature', $folioConsulta));

        $handler->push($events->verify_signature_header('x-signature'));
        $client = new \GuzzleHttp\Client([
            'handler' => $handler,
            'verify' => false
        ]); 

        $this->apiInstance = new \APIHub\Client\Api\ReporteDeCrditoApi($client);
        $x_api_key = "your_api_key";
        $username = "your_username";
        $password = "your_password";

        try {
            $result = $this->apiInstance->getDomicilios($folioConsulta, $x_api_key, $username, $password);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getDomicilios()!==null);
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }
    
    /**
     * @depends testGetReporte
     */
    public function testGetEmpleos($folioConsulta)
    {
        $events = new \APIHub\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = handlerStack::create();  
        $handler->push($events->add_signature_header_from_folio_consulta('x-signature', $folioConsulta));

        $handler->push($events->verify_signature_header('x-signature'));
        $client = new \GuzzleHttp\Client([
            'handler' => $handler,
            'verify' => false
        ]); 

        $this->apiInstance = new \APIHub\Client\Api\ReporteDeCrditoApi($client);
        $x_api_key = "your_api_key";
        $username = "your_username";
        $password = "your_password";

        try {
            $result = $this->apiInstance->getEmpleos($folioConsulta, $x_api_key, $username, $password);
            $this->signer->close();
            print_r($result);
            $this->assertTrue($result->getEmpleos()!==null);
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }
}
