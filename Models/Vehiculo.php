<?php

require_once "./Libraries/Core/MySql.php";


class Vehiculo extends Mysql {

    private $id;
    private $placa;
    private $marca;
    private $linea;
    private $modelo;
    private $tipo;
    private $id_propietario;

    public function __construct($placa, $marca, $linea, $modelo, $tipo, $id_propietario)
    {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->linea = $linea;
        $this->modelo = $modelo;
        $this->tipo = $tipo;
        $this->id_propietario = $id_propietario;

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
    

    public function insertarVehiculo($placa,$marca,$modelo,$anio,$tipo,$id_propietario){
        $query_insert = "INSERT INTO vehiculo (placa,marca,modelo,anio,tipo,id_propietario)
        VALUES (?,?,?,?,?,?)";
        $arrData = [$placa,$marca,$modelo,$anio,$tipo,$id_propietario];
        $request_insert = $this->insert($query_insert,$arrData);
        return $request_insert;
    }

    public function mostrarVehiculos(){
        $query_select = "SELECT * FROM vehiculo";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getPropietario(){
        $query_select = "SELECT * FROM propietario WHERE id = $this->id_propietario ";
        $request_select = $this->select($query_select);
        return $request_select;
    }

    public function getVehiculo($placa){
        $query_select = "SELECT id FROM vehiculo WHERE placa = $placa";
        $request_select = $this->select($query_select);

        if($request_select){
            echo "Encontrado correctamente.";
        }else{
            echo "No se encontro el vehiculo seleccionado.";
        }

        return $request_select;
    }

    public function updateVehiculo($request_id, $placa,$marca,$modelo,$anio,$tipo,$id_propietario){
        $query_update = "UPDATE vehiculo SET placa = ?, marca = ?, modelo = ?, anio = ?, tipo = ?, id_propietario WHERE id = $request_id)";
        $arrData = [$placa,$marca,$modelo,$anio,$tipo,$id_propietario];
        $requuest_insert = $this->update($query_update,$arrData);
        if($request_id){
            return $requuest_insert;
        }else{
            echo "Algo salio mal.";
        }
        
    }

    public function removerVehiculo($id){
        $query_delete = "DELETE FROM vehiculo WHERE id = $id";
        $request_delete = $this->delete($query_delete);
        return $request_delete;
    }


}

?>