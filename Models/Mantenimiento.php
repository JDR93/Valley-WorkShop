<?php

require_once "./Libraries/Core/MySql.php";
require_once "./Models/Taller.php";
require_once "./Models/vehiculo.php";
require_once "./Models/Mecanico.php";

class Mantenimiento extends Mysql {

    private $estado;
    private $vehiculo;
    private $mecanico;

    private $servicios = array();
    private $consumos = array();

    public function __construct(Vehiculo $vehiculo,$mecanico)
    {
        parent::__construct();

        $this->servicios = $this->getServicios();;
        $this->vehiculo = $vehiculo;
        $this->mecanico = $mecanico;
        $this->estado = 'P';
    }

    public function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }else{
            return "Propiedad no existe";
        }
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function  getVehiculo(){
        return $this->vehiculo;
    }

    public function  getMecanico() : Mecanico {
        return $this->mecanico;
    }

    public function getServicios()
    {
        $query_select = "SELECT id_servicio  FROM mantenimiento_servicios";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getServicio($id)
    {
        foreach ($this->servicios as $s) {
            if ($s->id_servicio  == $id) {
                return $s;
            }
        }
    }


    public function addServicio(Servicio $servicio) : void {

        foreach($this->servicios as $s){
            if ($servicio->codigo == ($s->codigo)) {
                throw new Exception("Servicio con mismo codigo ya se encuentra registrado.");
            }
        }
        
        array_push($this->servicios, $servicio);
    }

    

    
    
    

    /*
    
    */

    
}
