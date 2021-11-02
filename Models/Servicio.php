<?php

require_once "../../Libraries/Core/MySql.php";


class Servicio extends Mysql {
    public function __construct()
    {
        parent::__construct();
    }

    public function insertarServicio($codigo,$nombre,$descripcion,$costo,$imagen){
        $query_insert = "INSERT INTO servicio (codigo,nombre,descripcion,costo,imagen) 
        VALUES (?,?,?,?,?)";
        $arrData = [$codigo,$nombre,$descripcion,$costo,$imagen];
        $requuest_insert = $this->insert($query_insert,$arrData);
        return $requuest_insert;
    }

    public function mostrarServicios(){
        $query_select = "SELECT * FROM servicio";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getServicio($code){
        $query_select = "SELECT * FROM servicio WHERE codigo = $code";
        $request_select = $this->select($query_select);

        return $request_select;
    }

    public function updateServicio($request_id,$codigo,$nombre,$costo,$descripcion){
        $query_update = "UPDATE servicio SET codigo = ?, nombre = ?, costo = ?, descripcion = ? WHERE id = $request_id";
        $arrData = [$codigo,$nombre,$costo,$descripcion];
        $requuest_insert = $this->update($query_update,$arrData);
    }

    public function removerServicio($code){
        $query_delete = "DELETE FROM servicio WHERE codigo = $code";
        $request_delete = $this->delete($query_delete);
        return $request_delete;
    }


}

?>