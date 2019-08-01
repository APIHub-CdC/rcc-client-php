<?php

namespace APIHub\Client\Model;

use \ArrayAccess;
use \APIHub\Client\ObjectSerializer;

class Consulta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'Consulta';
    
    protected static $apihubTypes = [
        'fecha_consulta' => 'string',
        'clave_otorgante' => 'string',
        'nombre_otorgante' => 'string',
        'direccion_otorgante' => 'string',
        'telefono_otorgante' => 'string',
        'tipo_credito' => 'string',
        'importe_credito' => 'string',
        'tipo_responsabilidad' => '\APIHub\Client\Model\CatalogoTipoResponsabilidad',
        'clave_unidad_monetaria' => '\APIHub\Client\Model\CatalogoMoneda',
        'id_domicilio' => 'string',
        'servicios' => 'string'
    ];
    
    protected static $apihubFormats = [
        'fecha_consulta' => null,
        'clave_otorgante' => null,
        'nombre_otorgante' => null,
        'direccion_otorgante' => null,
        'telefono_otorgante' => null,
        'tipo_credito' => null,
        'importe_credito' => null,
        'tipo_responsabilidad' => null,
        'clave_unidad_monetaria' => null,
        'id_domicilio' => null,
        'servicios' => null
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
        'fecha_consulta' => 'fechaConsulta',
        'clave_otorgante' => 'claveOtorgante',
        'nombre_otorgante' => 'nombreOtorgante',
        'direccion_otorgante' => 'direccionOtorgante',
        'telefono_otorgante' => 'telefonoOtorgante',
        'tipo_credito' => 'tipoCredito',
        'importe_credito' => 'importeCredito',
        'tipo_responsabilidad' => 'tipoResponsabilidad',
        'clave_unidad_monetaria' => 'claveUnidadMonetaria',
        'id_domicilio' => 'idDomicilio',
        'servicios' => 'servicios'
    ];
    
    protected static $setters = [
        'fecha_consulta' => 'setFechaConsulta',
        'clave_otorgante' => 'setClaveOtorgante',
        'nombre_otorgante' => 'setNombreOtorgante',
        'direccion_otorgante' => 'setDireccionOtorgante',
        'telefono_otorgante' => 'setTelefonoOtorgante',
        'tipo_credito' => 'setTipoCredito',
        'importe_credito' => 'setImporteCredito',
        'tipo_responsabilidad' => 'setTipoResponsabilidad',
        'clave_unidad_monetaria' => 'setClaveUnidadMonetaria',
        'id_domicilio' => 'setIdDomicilio',
        'servicios' => 'setServicios'
    ];
    
    protected static $getters = [
        'fecha_consulta' => 'getFechaConsulta',
        'clave_otorgante' => 'getClaveOtorgante',
        'nombre_otorgante' => 'getNombreOtorgante',
        'direccion_otorgante' => 'getDireccionOtorgante',
        'telefono_otorgante' => 'getTelefonoOtorgante',
        'tipo_credito' => 'getTipoCredito',
        'importe_credito' => 'getImporteCredito',
        'tipo_responsabilidad' => 'getTipoResponsabilidad',
        'clave_unidad_monetaria' => 'getClaveUnidadMonetaria',
        'id_domicilio' => 'getIdDomicilio',
        'servicios' => 'getServicios'
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
        $this->container['fecha_consulta'] = isset($data['fecha_consulta']) ? $data['fecha_consulta'] : null;
        $this->container['clave_otorgante'] = isset($data['clave_otorgante']) ? $data['clave_otorgante'] : null;
        $this->container['nombre_otorgante'] = isset($data['nombre_otorgante']) ? $data['nombre_otorgante'] : null;
        $this->container['direccion_otorgante'] = isset($data['direccion_otorgante']) ? $data['direccion_otorgante'] : null;
        $this->container['telefono_otorgante'] = isset($data['telefono_otorgante']) ? $data['telefono_otorgante'] : null;
        $this->container['tipo_credito'] = isset($data['tipo_credito']) ? $data['tipo_credito'] : null;
        $this->container['importe_credito'] = isset($data['importe_credito']) ? $data['importe_credito'] : null;
        $this->container['tipo_responsabilidad'] = isset($data['tipo_responsabilidad']) ? $data['tipo_responsabilidad'] : null;
        $this->container['clave_unidad_monetaria'] = isset($data['clave_unidad_monetaria']) ? $data['clave_unidad_monetaria'] : null;
        $this->container['id_domicilio'] = isset($data['id_domicilio']) ? $data['id_domicilio'] : null;
        $this->container['servicios'] = isset($data['servicios']) ? $data['servicios'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if (!is_null($this->container['id_domicilio']) && (mb_strlen($this->container['id_domicilio']) > 20)) {
            $invalidProperties[] = "invalid value for 'id_domicilio', the character length must be smaller than or equal to 20.";
        }
        if (!is_null($this->container['id_domicilio']) && (mb_strlen($this->container['id_domicilio']) < 0)) {
            $invalidProperties[] = "invalid value for 'id_domicilio', the character length must be bigger than or equal to 0.";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getFechaConsulta()
    {
        return $this->container['fecha_consulta'];
    }
    
    public function setFechaConsulta($fecha_consulta)
    {
        $this->container['fecha_consulta'] = $fecha_consulta;
        return $this;
    }
    
    public function getClaveOtorgante()
    {
        return $this->container['clave_otorgante'];
    }
    
    public function setClaveOtorgante($clave_otorgante)
    {
        $this->container['clave_otorgante'] = $clave_otorgante;
        return $this;
    }
    
    public function getNombreOtorgante()
    {
        return $this->container['nombre_otorgante'];
    }
    
    public function setNombreOtorgante($nombre_otorgante)
    {
        $this->container['nombre_otorgante'] = $nombre_otorgante;
        return $this;
    }
    
    public function getDireccionOtorgante()
    {
        return $this->container['direccion_otorgante'];
    }
    
    public function setDireccionOtorgante($direccion_otorgante)
    {
        $this->container['direccion_otorgante'] = $direccion_otorgante;
        return $this;
    }
    
    public function getTelefonoOtorgante()
    {
        return $this->container['telefono_otorgante'];
    }
    
    public function setTelefonoOtorgante($telefono_otorgante)
    {
        $this->container['telefono_otorgante'] = $telefono_otorgante;
        return $this;
    }
    
    public function getTipoCredito()
    {
        return $this->container['tipo_credito'];
    }
    
    public function setTipoCredito($tipo_credito)
    {
        $this->container['tipo_credito'] = $tipo_credito;
        return $this;
    }
    
    public function getImporteCredito()
    {
        return $this->container['importe_credito'];
    }
    
    public function setImporteCredito($importe_credito)
    {
        $this->container['importe_credito'] = $importe_credito;
        return $this;
    }
    
    public function getTipoResponsabilidad()
    {
        return $this->container['tipo_responsabilidad'];
    }
    
    public function setTipoResponsabilidad($tipo_responsabilidad)
    {
        $this->container['tipo_responsabilidad'] = $tipo_responsabilidad;
        return $this;
    }
    
    public function getClaveUnidadMonetaria()
    {
        return $this->container['clave_unidad_monetaria'];
    }
    
    public function setClaveUnidadMonetaria($clave_unidad_monetaria)
    {
        $this->container['clave_unidad_monetaria'] = $clave_unidad_monetaria;
        return $this;
    }
    
    public function getIdDomicilio()
    {
        return $this->container['id_domicilio'];
    }
    
    public function setIdDomicilio($id_domicilio)
    {
        if (!is_null($id_domicilio) && (mb_strlen($id_domicilio) > 20)) {
            throw new \InvalidArgumentException('invalid length for $id_domicilio when calling Consulta., must be smaller than or equal to 20.');
        }
        if (!is_null($id_domicilio) && (mb_strlen($id_domicilio) < 0)) {
            throw new \InvalidArgumentException('invalid length for $id_domicilio when calling Consulta., must be bigger than or equal to 0.');
        }
        $this->container['id_domicilio'] = $id_domicilio;
        return $this;
    }
    
    public function getServicios()
    {
        return $this->container['servicios'];
    }
    
    public function setServicios($servicios)
    {
        $this->container['servicios'] = $servicios;
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
