<?php

require_once "./Libraries/Core/MySql.php";


class Mantenimiento extends Mysql {
    public function __construct()
    {
        parent::__construct();
    }

    public function insertarMantenimiento($state ,$id_vehiculo){
        $query_insert = "INSERT INTO mantenimiento (state ,id_vehiculo) 
        VALUES (?,?)";
        $arrData = [$state , $id_vehiculo];
        $requuest_insert = $this->insert($query_insert,$arrData);
        return $requuest_insert;
    }

    public function mostrarMantenimientos(){
        $query_select = "SELECT * FROM mantenimiento";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getMantenimiento($id){
        $query_select = "SELECT * FROM mantenimiento WHERE id = $id";
        $request_select = $this->select($query_select);

        if($request_select){
            echo "Encontrado correctamente.";
        }else{
            echo "No se encontro el mantenimiento seleccionado.";
        }

        return $request_select;
    }

    public function updateMantenimiento($request_id,$codigo,$nombre,$costo){
        $query_update = "UPDATE mantenimiento SET codigo = ?, nombre = ?, costo = ? WHERE id = $request_id)";
        $arrData = [$codigo,$nombre,$costo];
        $requuest_insert = $this->update($query_update,$arrData);
        if($request_id){
            return $requuest_insert;
        }else{
            echo "Algo salio mal.";
        }
        
    }

    public function removerMantenimiento($id){
        $query_delete = "DELETE FROM mantenimiento WHERE id = $id";
        $request_delete = $this->delete($query_delete);
        return $request_delete;
    }


}

?>