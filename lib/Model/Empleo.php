<?php

namespace APIHub\Client\Model;

use \ArrayAccess;
use \APIHub\Client\ObjectSerializer;

class Empleo implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'Empleo';
    
    protected static $apihubTypes = [
        'nombre_empresa' => 'string',
        'direccion' => 'string',
        'colonia' => 'string',
        'municipio' => 'string',
        'ciudad' => 'string',
        'estado' => '\APIHub\Client\Model\CatalogoEstados',
        'codigo_postal' => 'string',
        'numero_telefono' => 'string',
        'extension' => 'string',
        'fax' => 'string',
        'puesto' => 'string',
        'fecha_contratacion' => 'string',
        'clave_moneda' => '\APIHub\Client\Model\CatalogoMoneda',
        'salario_mensual' => 'string',
        'fecha_ultimo_dia_empleo' => 'string',
        'fecha_verificacion_empleo' => 'string'
    ];
    
    protected static $apihubFormats = [
        'nombre_empresa' => null,
        'direccion' => null,
        'colonia' => null,
        'municipio' => null,
        'ciudad' => null,
        'estado' => null,
        'codigo_postal' => null,
        'numero_telefono' => null,
        'extension' => null,
        'fax' => null,
        'puesto' => null,
        'fecha_contratacion' => 'yyyy-MM-dd',
        'clave_moneda' => null,
        'salario_mensual' => null,
        'fecha_ultimo_dia_empleo' => 'yyyy-MM-dd',
        'fecha_verificacion_empleo' => 'yyyy-MM-dd'
    ];
    
    public static function apihubTypes()
    {
        return self::$apihubTypes;
    }
    
    public static function apihubFormats()
    {
        return self::$apihubFormats;
    }
    
    protected static $attributeMap = [
        'nombre_empresa' => 'nombreEmpresa',
        'direccion' => 'direccion',
        'colonia' => 'colonia',
        'municipio' => 'municipio',
        'ciudad' => 'ciudad',
        'estado' => 'estado',
        'codigo_postal' => 'codigoPostal',
        'numero_telefono' => 'numeroTelefono',
        'extension' => 'extension',
        'fax' => 'fax',
        'puesto' => 'puesto',
        'fecha_contratacion' => 'fechaContratacion',
        'clave_moneda' => 'claveMoneda',
        'salario_mensual' => 'salarioMensual',
        'fecha_ultimo_dia_empleo' => 'fechaUltimoDiaEmpleo',
        'fecha_verificacion_empleo' => 'fechaVerificacionEmpleo'
    ];
    
    protected static $setters = [
        'nombre_empresa' => 'setNombreEmpresa',
        'direccion' => 'setDireccion',
        'colonia' => 'setColonia',
        'municipio' => 'setMunicipio',
        'ciudad' => 'setCiudad',
        'estado' => 'setEstado',
        'codigo_postal' => 'setCodigoPostal',
        'numero_telefono' => 'setNumeroTelefono',
        'extension' => 'setExtension',
        'fax' => 'setFax',
        'puesto' => 'setPuesto',
        'fecha_contratacion' => 'setFechaContratacion',
        'clave_moneda' => 'setClaveMoneda',
        'salario_mensual' => 'setSalarioMensual',
        'fecha_ultimo_dia_empleo' => 'setFechaUltimoDiaEmpleo',
        'fecha_verificacion_empleo' => 'setFechaVerificacionEmpleo'
    ];
    
    protected static $getters = [
        'nombre_empresa' => 'getNombreEmpresa',
        'direccion' => 'getDireccion',
        'colonia' => 'getColonia',
        'municipio' => 'getMunicipio',
        'ciudad' => 'getCiudad',
        'estado' => 'getEstado',
        'codigo_postal' => 'getCodigoPostal',
        'numero_telefono' => 'getNumeroTelefono',
        'extension' => 'getExtension',
        'fax' => 'getFax',
        'puesto' => 'getPuesto',
        'fecha_contratacion' => 'getFechaContratacion',
        'clave_moneda' => 'getClaveMoneda',
        'salario_mensual' => 'getSalarioMensual',
        'fecha_ultimo_dia_empleo' => 'getFechaUltimoDiaEmpleo',
        'fecha_verificacion_empleo' => 'getFechaVerificacionEmpleo'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$apihubModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['nombre_empresa'] = isset($data['nombre_empresa']) ? $data['nombre_empresa'] : null;
        $this->container['direccion'] = isset($data['direccion']) ? $data['direccion'] : null;
        $this->container['colonia'] = isset($data['colonia']) ? $data['colonia'] : null;
        $this->container['municipio'] = isset($data['municipio']) ? $data['municipio'] : null;
        $this->container['ciudad'] = isset($data['ciudad']) ? $data['ciudad'] : null;
        $this->container['estado'] = isset($data['estado']) ? $data['estado'] : null;
        $this->container['codigo_postal'] = isset($data['codigo_postal']) ? $data['codigo_postal'] : null;
        $this->container['numero_telefono'] = isset($data['numero_telefono']) ? $data['numero_telefono'] : null;
        $this->container['extension'] = isset($data['extension']) ? $data['extension'] : null;
        $this->container['fax'] = isset($data['fax']) ? $data['fax'] : null;
        $this->container['puesto'] = isset($data['puesto']) ? $data['puesto'] : null;
        $this->container['fecha_contratacion'] = isset($data['fecha_contratacion']) ? $data['fecha_contratacion'] : null;
        $this->container['clave_moneda'] = isset($data['clave_moneda']) ? $data['clave_moneda'] : null;
        $this->container['salario_mensual'] = isset($data['salario_mensual']) ? $data['salario_mensual'] : null;
        $this->container['fecha_ultimo_dia_empleo'] = isset($data['fecha_ultimo_dia_empleo']) ? $data['fecha_ultimo_dia_empleo'] : null;
        $this->container['fecha_verificacion_empleo'] = isset($data['fecha_verificacion_empleo']) ? $data['fecha_verificacion_empleo'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if (!is_null($this->container['direccion']) && (mb_strlen($this->container['direccion']) > 85)) {
            $invalidProperties[] = "invalid value for 'direccion', the character length must be smaller than or equal to 85.";
        }
        if (!is_null($this->container['direccion']) && (mb_strlen($this->container['direccion']) < 0)) {
            $invalidProperties[] = "invalid value for 'direccion', the character length must be bigger than or equal to 0.";
        }
        if (!is_null($this->container['colonia']) && (mb_strlen($this->container['colonia']) > 65)) {
            $invalidProperties[] = "invalid value for 'colonia', the character length must be smaller than or equal to 65.";
        }
        if (!is_null($this->container['colonia']) && (mb_strlen($this->container['colonia']) < 0)) {
            $invalidProperties[] = "invalid value for 'colonia', the character length must be bigger than or equal to 0.";
        }
        if (!is_null($this->container['municipio']) && (mb_strlen($this->container['municipio']) > 65)) {
            $invalidProperties[] = "invalid value for 'municipio', the character length must be smaller than or equal to 65.";
        }
        if (!is_null($this->container['municipio']) && (mb_strlen($this->container['municipio']) < 0)) {
            $invalidProperties[] = "invalid value for 'municipio', the character length must be bigger than or equal to 0.";
        }
        if (!is_null($this->container['ciudad']) && (mb_strlen($this->container['ciudad']) > 65)) {
            $invalidProperties[] = "invalid value for 'ciudad', the character length must be smaller than or equal to 65.";
        }
        if (!is_null($this->container['ciudad']) && (mb_strlen($this->container['ciudad']) < 0)) {
            $invalidProperties[] = "invalid value for 'ciudad', the character length must be bigger than or equal to 0.";
        }
        if (!is_null($this->container['codigo_postal']) && (mb_strlen($this->container['codigo_postal']) > 5)) {
            $invalidProperties[] = "invalid value for 'codigo_postal', the character length must be smaller than or equal to 5.";
        }
        if (!is_null($this->container['codigo_postal']) && (mb_strlen($this->container['codigo_postal']) < 5)) {
            $invalidProperties[] = "invalid value for 'codigo_postal', the character length must be bigger than or equal to 5.";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getNombreEmpresa()
    {
        return $this->container['nombre_empresa'];
    }
    
    public function setNombreEmpresa($nombre_empresa)
    {
        $this->container['nombre_empresa'] = $nombre_empresa;
        return $this;
    }
    
    public function getDireccion()
    {
        return $this->container['direccion'];
    }
    
    public function setDireccion($direccion)
    {
        if (!is_null($direccion) && (mb_strlen($direccion) > 85)) {
            throw new \InvalidArgumentException('invalid length for $direccion when calling Empleo., must be smaller than or equal to 85.');
        }
        if (!is_null($direccion) && (mb_strlen($direccion) < 0)) {
            throw new \InvalidArgumentException('invalid length for $direccion when calling Empleo., must be bigger than or equal to 0.');
        }
        $this->container['direccion'] = $direccion;
        return $this;
    }
    
    public function getColonia()
    {
        return $this->container['colonia'];
    }
    
    public function setColonia($colonia)
    {
        if (!is_null($colonia) && (mb_strlen($colonia) > 65)) {
            throw new \InvalidArgumentException('invalid length for $colonia when calling Empleo., must be smaller than or equal to 65.');
        }
        if (!is_null($colonia) && (mb_strlen($colonia) < 0)) {
            throw new \InvalidArgumentException('invalid length for $colonia when calling Empleo., must be bigger than or equal to 0.');
        }
        $this->container['colonia'] = $colonia;
        return $this;
    }
    
    public function getMunicipio()
    {
        return $this->container['municipio'];
    }
    
    public function setMunicipio($municipio)
    {
        if (!is_null($municipio) && (mb_strlen($municipio) > 65)) {
            throw new \InvalidArgumentException('invalid length for $municipio when calling Empleo., must be smaller than or equal to 65.');
        }
        if (!is_null($municipio) && (mb_strlen($municipio) < 0)) {
            throw new \InvalidArgumentException('invalid length for $municipio when calling Empleo., must be bigger than or equal to 0.');
        }
        $this->container['municipio'] = $municipio;
        return $this;
    }
    
    public function getCiudad()
    {
        return $this->container['ciudad'];
    }
    
    public function setCiudad($ciudad)
    {
        if (!is_null($ciudad) && (mb_strlen($ciudad) > 65)) {
            throw new \InvalidArgumentException('invalid length for $ciudad when calling Empleo., must be smaller than or equal to 65.');
        }
        if (!is_null($ciudad) && (mb_strlen($ciudad) < 0)) {
            throw new \InvalidArgumentException('invalid length for $ciudad when calling Empleo., must be bigger than or equal to 0.');
        }
        $this->container['ciudad'] = $ciudad;
        return $this;
    }
    
    public function getEstado()
    {
        return $this->container['estado'];
    }
    
    public function setEstado($estado)
    {
        $this->container['estado'] = $estado;
        return $this;
    }
    
    public function getCodigoPostal()
    {
        return $this->container['codigo_postal'];
    }
    
    public function setCodigoPostal($codigo_postal)
    {
        if (!is_null($codigo_postal) && (mb_strlen($codigo_postal) > 5)) {
            throw new \InvalidArgumentException('invalid length for $codigo_postal when calling Empleo., must be smaller than or equal to 5.');
        }
        if (!is_null($codigo_postal) && (mb_strlen($codigo_postal) < 5)) {
            throw new \InvalidArgumentException('invalid length for $codigo_postal when calling Empleo., must be bigger than or equal to 5.');
        }
        $this->container['codigo_postal'] = $codigo_postal;
        return $this;
    }
    
    public function getNumeroTelefono()
    {
        return $this->container['numero_telefono'];
    }
    
    public function setNumeroTelefono($numero_telefono)
    {
        $this->container['numero_telefono'] = $numero_telefono;
        return $this;
    }
    
    public function getExtension()
    {
        return $this->container['extension'];
    }
    
    public function setExtension($extension)
    {
        $this->container['extension'] = $extension;
        return $this;
    }
    
    public function getFax()
    {
        return $this->container['fax'];
    }
    
    public function setFax($fax)
    {
        $this->container['fax'] = $fax;
        return $this;
    }
    
    public function getPuesto()
    {
        return $this->container['puesto'];
    }
    
    public function setPuesto($puesto)
    {
        $this->container['puesto'] = $puesto;
        return $this;
    }
    
    public function getFechaContratacion()
    {
        return $this->container['fecha_contratacion'];
    }
    
    public function setFechaContratacion($fecha_contratacion)
    {
        $this->container['fecha_contratacion'] = $fecha_contratacion;
        return $this;
    }
    
    public function getClaveMoneda()
    {
        return $this->container['clave_moneda'];
    }
    
    public function setClaveMoneda($clave_moneda)
    {
        $this->container['clave_moneda'] = $clave_moneda;
        return $this;
    }
    
    public function getSalarioMensual()
    {
        return $this->container['salario_mensual'];
    }
    
    public function setSalarioMensual($salario_mensual)
    {
        $this->container['salario_mensual'] = $salario_mensual;
        return $this;
    }
    
    public function getFechaUltimoDiaEmpleo()
    {
        return $this->container['fecha_ultimo_dia_empleo'];
    }
    
    public function setFechaUltimoDiaEmpleo($fecha_ultimo_dia_empleo)
    {
        $this->container['fecha_ultimo_dia_empleo'] = $fecha_ultimo_dia_empleo;
        return $this;
    }
    
    public function getFechaVerificacionEmpleo()
    {
        return $this->container['fecha_verificacion_empleo'];
    }
    
    public function setFechaVerificacionEmpleo($fecha_verificacion_empleo)
    {
        $this->container['fecha_verificacion_empleo'] = $fecha_verificacion_empleo;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
