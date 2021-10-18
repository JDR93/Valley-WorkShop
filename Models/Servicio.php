<?php

require_once "./Libraries/Core/MySql.php";


class Servicio extends Mysql {
    public function __construct()
    {
        parent::__construct();
    }

    public function insertarServicio($codigo,$nombre,$costo){
        $query_insert = "INSERT INTO servicio (codigo,nombre,costo) 
        VALUES (?,?,?)";
        $arrData = [$codigo,$nombre,$costo];
        $requuest_insert = $this->insert($query_insert,$arrData);
        return $requuest_insert;
    }

    public function mostrarServicios(){
        $query_select = "SELECT * FROM servicio";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getServicio($id){
        $query_select = "SELECT * FROM servicio WHERE id = $id";
        $request_select = $this->select($query_select);

        if($request_select){
            echo "Encontrado correctamente.";
        }else{
            echo "No se encontro el servicio seleccionado.";
        }

        return $request_select;
    }

    public function updateServicio($request_id,$codigo,$nombre,$costo){
        $query_update = "UPDATE servicio SET codigo = ?, nombre = ?, costo = ? WHERE id = $request_id)";
        $arrData = [$codigo,$nombre,$costo];
        $requuest_insert = $this->update($query_update,$arrData);
        if($request_id){
            return $requuest_insert;
        }else{
            echo "Algo salio mal.";
        }
        
    }

    public function removerServicio($id){
        $query_delete = "DELETE FROM servicio WHERE id = $id";
        $request_delete = $this->delete($query_delete);
        return $request_delete;
    }


}

?>