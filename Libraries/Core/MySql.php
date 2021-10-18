<?php

require_once "conection.php";

class Mysql extends BD
{
    private $conexion;
    private $query;
    private $array;

    public function  __construct()
    {
        $this->conexion = BD::instanciar();
    }

    public function insert($query, $array)
    {
        $this->query = $query;
        $this->array = $array;

        $insert = $this->conexion->prepare($this->query);
        $result = $insert->execute($this->array);

        if ($result) {
            $lastinsert = $this->conexion->lastInsertId();
        } else {
            $lastinsert = 0;
        }

        return $lastinsert;
    }

    public function selectAll($query)
    {
        $this->query = $query;

        $selectAll = $this->conexion->query($query);
        $data = $selectAll->fetchAll(PDO::FETCH_BOTH);
        return $data;
    }

    public function select($query)
    {
        $this->query = $query;

        $result = $this->conexion->prepare($this->query);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_BOTH);
        return $data;
    }

    public function update($query, $array)
    {
        $this->query = $query;
        $this->array = $array;

        $result = $this->conexion->prepare($this->query);
        $result->execute($array);
    }


    public function delete($query)
    {
        $this->query = $query;
        
        $result = $this->conexion->prepare($this->query);
        $data = $result->execute();
        return $data;
        
    }
}
