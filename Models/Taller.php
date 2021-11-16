<?php

require_once "./Libraries/Core/MySql.php";
require_once "Models/Propietario.php";
require_once "Models/Vehiculo.php";



class Taller extends Mysql {

    private $nit;
    private $nombre;
    private $mantPendientes = array();
    private $serivicios = array();
    private $vehiculos = array();
    private $propietarios = array();

    public function __construct($nit, $nombre)
    { 
        parent::__construct();
        $this->nit = $nit;
        $this->nombre = $nombre;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function getServicios(){
        $query_select = "SELECT * FROM servicio ORDER BY codigo";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }
    public function getServicio($id_service){
        $query_select = "SELECT * FROM servicio WHERE id = $id_service";
        $request_select = $this->select($query_select);
        return $request_select;
    }

    public function getServicioCode($codigo){
        $query_select = "SELECT * FROM servicio WHERE codigo = $codigo";
        $request_select = $this->select($query_select);
        return $request_select;
    }

    public function getVehiculo($placa){
        $query_select = "SELECT * FROM vehiculo WHERE placa = '$placa' ";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function addMantPendiente(Mantenimiento $mantenimiento){
        $query_insert = "INSERT INTO mantenimiento (estado,id_vehiculo) 
        VALUES (?,?)";
        $arrData = [$mantenimiento->estado, $mantenimiento->id_vehiculo];
        $requuest_insert = $this->insert($query_insert, $arrData);
        return $requuest_insert;
    }

    public function getMantPendiente($id){
        $query_select = "SELECT * FROM mantenimiento WHERE id = $id";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getIDVehiculosMantPendiente(){
        $query_select = "SELECT id_vehiculo FROM mantenimiento";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }
}
