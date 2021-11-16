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

    public function __construct($id_vehiculo)
    {
        parent::__construct();

        $this->id_vehiculo = $id_vehiculo;

        $query_insert = "INSERT INTO mantenimiento (estado, id_vehiculo)
        VALUES (?,?)";
        $arrData = ['P',$id_vehiculo];
        $request_insert = $this->insert($query_insert,$arrData);
        $this->id = $request_insert;

        /*
        $this->vehiculo = $vehiculo;

        $porpietario = $vehiculo->getPropietario();

        $query_insert = "INSERT INTO propietario (nuid,nombres,apellidos,genero,telefono,correo,direccion)
        VALUES (?,?,?,?,?,?,?)";
        $arrData = [$porpietario->nuid, $porpietario->nombres, $porpietario->apellidos,
                     $porpietario->genero, $porpietario->telefono, $porpietario->correo, $porpietario->direccion];

        $id_prop = $this->insert($query_insert,$arrData);
        
        $query_insert = "INSERT INTO vehiculo (placa,marca,modelo,anio,tipo,id_propietario)
        VALUES (?,?,?,?,?,?)";
        $arrData = [$vehiculo->placa,$vehiculo->marca,$vehiculo->modelo,$vehiculo->modelo,$vehiculo->tipo,$id_prop];
        $id_veh = $this->insert($query_insert,$arrData);

        $query_insert = "INSERT INTO mantenimiento (estado, id_vehiculo)
        VALUES (?,?)";
        $arrData = ['P',$id_veh];
        $request_insert = $this->insert($query_insert,$arrData);
        return $request_insert;

        */
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function addServicio($id_servicio){
        $query_insert = "INSERT INTO mantenimiento_servicios (id_mantenimiento,id_servicio)
        VALUES (?,?)";
        $arrData = [$this->id,$id_servicio];
        $this->insert($query_insert,$arrData);
    }

}

?>