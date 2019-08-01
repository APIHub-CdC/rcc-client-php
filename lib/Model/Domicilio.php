<?php

namespace APIHub\Client\Model;

use \ArrayAccess;
use \APIHub\Client\ObjectSerializer;

class Domicilio implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'Domicilio';
    
    protected static $apihubTypes = [
        'direccion' => 'string',
        'colonia' => 'string',
        'municipio' => 'string',
        'ciudad' => 'string',
        'estado' => '\APIHub\Client\Model\CatalogoEstados',
        'codigo_postal' => 'string',
        'fecha_residencia' => 'string',
        'numero_telefono' => 'string',
        'tipo_domicilio' => '\APIHub\Client\Model\CatalogoTipoDomicilio',
        'tipo_asentamiento' => '\APIHub\Client\Model\CatalogoTipoAsentamiento'
    ];
    
    protected static $apihubFormats = [
        'direccion' => null,
        'colonia' => null,
        'municipio' => null,
        'ciudad' => null,
        'estado' => null,
        'codigo_postal' => null,
        'fecha_residencia' => 'yyyy-MM-dd',
        'numero_telefono' => null,
        'tipo_domicilio' => null,
        'tipo_asentamiento' => null
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
        'direccion' => 'direccion',
        'colonia' => 'colonia',
        'municipio' => 'municipio',
        'ciudad' => 'ciudad',
        'estado' => 'estado',
        'codigo_postal' => 'codigoPostal',
        'fecha_residencia' => 'fechaResidencia',
        'numero_telefono' => 'numeroTelefono',
        'tipo_domicilio' => 'tipoDomicilio',
        'tipo_asentamiento' => 'tipoAsentamiento'
    ];
    
    protected static $setters = [
        'direccion' => 'setDireccion',
        'colonia' => 'setColonia',
        'municipio' => 'setMunicipio',
        'ciudad' => 'setCiudad',
        'estado' => 'setEstado',
        'codigo_postal' => 'setCodigoPostal',
        'fecha_residencia' => 'setFechaResidencia',
        'numero_telefono' => 'setNumeroTelefono',
        'tipo_domicilio' => 'setTipoDomicilio',
        'tipo_asentamiento' => 'setTipoAsentamiento'
    ];
    
    protected static $getters = [
        'direccion' => 'getDireccion',
        'colonia' => 'getColonia',
        'municipio' => 'getMunicipio',
        'ciudad' => 'getCiudad',
        'estado' => 'getEstado',
        'codigo_postal' => 'getCodigoPostal',
        'fecha_residencia' => 'getFechaResidencia',
        'numero_telefono' => 'getNumeroTelefono',
        'tipo_domicilio' => 'getTipoDomicilio',
        'tipo_asentamiento' => 'getTipoAsentamiento'
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
        $this->container['direccion'] = isset($data['direccion']) ? $data['direccion'] : null;
        $this->container['colonia'] = isset($data['colonia']) ? $data['colonia'] : null;
        $this->container['municipio'] = isset($data['municipio']) ? $data['municipio'] : null;
        $this->container['ciudad'] = isset($data['ciudad']) ? $data['ciudad'] : null;
        $this->container['estado'] = isset($data['estado']) ? $data['estado'] : null;
        $this->container['codigo_postal'] = isset($data['codigo_postal']) ? $data['codigo_postal'] : null;
        $this->container['fecha_residencia'] = isset($data['fecha_residencia']) ? $data['fecha_residencia'] : null;
        $this->container['numero_telefono'] = isset($data['numero_telefono']) ? $data['numero_telefono'] : null;
        $this->container['tipo_domicilio'] = isset($data['tipo_domicilio']) ? $data['tipo_domicilio'] : null;
        $this->container['tipo_asentamiento'] = isset($data['tipo_asentamiento']) ? $data['tipo_asentamiento'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['direccion'] === null) {
            $invalidProperties[] = "'direccion' can't be null";
        }
        if ((mb_strlen($this->container['direccion']) > 85)) {
            $invalidProperties[] = "invalid value for 'direccion', the character length must be smaller than or equal to 85.";
        }
        if ((mb_strlen($this->container['direccion']) < 0)) {
            $invalidProperties[] = "invalid value for 'direccion', the character length must be bigger than or equal to 0.";
        }
        if ($this->container['colonia'] === null) {
            $invalidProperties[] = "'colonia' can't be null";
        }
        if ((mb_strlen($this->container['colonia']) > 65)) {
            $invalidProperties[] = "invalid value for 'colonia', the character length must be smaller than or equal to 65.";
        }
        if ((mb_strlen($this->container['colonia']) < 0)) {
            $invalidProperties[] = "invalid value for 'colonia', the character length must be bigger than or equal to 0.";
        }
        if ($this->container['municipio'] === null) {
            $invalidProperties[] = "'municipio' can't be null";
        }
        if ((mb_strlen($this->container['municipio']) > 65)) {
            $invalidProperties[] = "invalid value for 'municipio', the character length must be smaller than or equal to 65.";
        }
        if ((mb_strlen($this->container['municipio']) < 0)) {
            $invalidProperties[] = "invalid value for 'municipio', the character length must be bigger than or equal to 0.";
        }
        if ($this->container['ciudad'] === null) {
            $invalidProperties[] = "'ciudad' can't be null";
        }
        if ((mb_strlen($this->container['ciudad']) > 65)) {
            $invalidProperties[] = "invalid value for 'ciudad', the character length must be smaller than or equal to 65.";
        }
        if ((mb_strlen($this->container['ciudad']) < 0)) {
            $invalidProperties[] = "invalid value for 'ciudad', the character length must be bigger than or equal to 0.";
        }
        if ($this->container['estado'] === null) {
            $invalidProperties[] = "'estado' can't be null";
        }
        if ($this->container['codigo_postal'] === null) {
            $invalidProperties[] = "'codigo_postal' can't be null";
        }
        if ((mb_strlen($this->container['codigo_postal']) > 5)) {
            $invalidProperties[] = "invalid value for 'codigo_postal', the character length must be smaller than or equal to 5.";
        }
        if ((mb_strlen($this->container['codigo_postal']) < 5)) {
            $invalidProperties[] = "invalid value for 'codigo_postal', the character length must be bigger than or equal to 5.";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getDireccion()
    {
        return $this->container['direccion'];
    }
    
    public function setDireccion($direccion)
    {
        if ((mb_strlen($direccion) > 85)) {
            throw new \InvalidArgumentException('invalid length for $direccion when calling Domicilio., must be smaller than or equal to 85.');
        }
        if ((mb_strlen($direccion) < 0)) {
            throw new \InvalidArgumentException('invalid length for $direccion when calling Domicilio., must be bigger than or equal to 0.');
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
        if ((mb_strlen($colonia) > 65)) {
            throw new \InvalidArgumentException('invalid length for $colonia when calling Domicilio., must be smaller than or equal to 65.');
        }
        if ((mb_strlen($colonia) < 0)) {
            throw new \InvalidArgumentException('invalid length for $colonia when calling Domicilio., must be bigger than or equal to 0.');
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
        if ((mb_strlen($municipio) > 65)) {
            throw new \InvalidArgumentException('invalid length for $municipio when calling Domicilio., must be smaller than or equal to 65.');
        }
        if ((mb_strlen($municipio) < 0)) {
            throw new \InvalidArgumentException('invalid length for $municipio when calling Domicilio., must be bigger than or equal to 0.');
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
        if ((mb_strlen($ciudad) > 65)) {
            throw new \InvalidArgumentException('invalid length for $ciudad when calling Domicilio., must be smaller than or equal to 65.');
        }
        if ((mb_strlen($ciudad) < 0)) {
            throw new \InvalidArgumentException('invalid length for $ciudad when calling Domicilio., must be bigger than or equal to 0.');
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
        if ((mb_strlen($codigo_postal) > 5)) {
            throw new \InvalidArgumentException('invalid length for $codigo_postal when calling Domicilio., must be smaller than or equal to 5.');
        }
        if ((mb_strlen($codigo_postal) < 5)) {
            throw new \InvalidArgumentException('invalid length for $codigo_postal when calling Domicilio., must be bigger than or equal to 5.');
        }
        $this->container['codigo_postal'] = $codigo_postal;
        return $this;
    }
    
    public function getFechaResidencia()
    {
        return $this->container['fecha_residencia'];
    }
    
    public function setFechaResidencia($fecha_residencia)
    {
        $this->container['fecha_residencia'] = $fecha_residencia;
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
    
    public function getTipoDomicilio()
    {
        return $this->container['tipo_domicilio'];
    }
    
    public function setTipoDomicilio($tipo_domicilio)
    {
        $this->container['tipo_domicilio'] = $tipo_domicilio;
        return $this;
    }
    
    public function getTipoAsentamiento()
    {
        return $this->container['tipo_asentamiento'];
    }
    
    public function setTipoAsentamiento($tipo_asentamiento)
    {
        $this->container['tipo_asentamiento'] = $tipo_asentamiento;
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
