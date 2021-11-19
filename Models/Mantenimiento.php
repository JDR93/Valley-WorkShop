<?php

require_once "./Libraries/Core/MySql.php";
require_once "./Models/Taller.php";


class Mantenimiento extends Mysql {

    private $id;
    private $estado;
    private $id_vehiculo;
    private $id_mecanico;

    private $serivicios = array();
    private $consumos = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function addServicio($id_mantenimiento, $id_servicio){
        $query_insert = "INSERT INTO mantenimiento_servicios (id_mantenimiento,id_servicio)
        VALUES (?,?)";
        $arrData = [$id_mantenimiento,$id_servicio];
        $this->insert($query_insert,$arrData);
    }

    public function getServicios($id_mantenimiento){
        $query_select = "SELECT id_servicio FROM mantenimiento_servicios WHERE id_mantenimiento = $id_mantenimiento";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

}

?>