<?php

require_once "./Libraries/Core/MySql.php";


class Propietario extends Mysql {
    public function __construct()
    {
        parent::__construct();
    }

    public function insertarPropietario($nuid,$nombres,$apellidos,$genero,$telefono,$correo,$direccion){
        $query_insert = "INSERT INTO propietario (nuid, nombres, apellidos, genero, telefono, correo, direccion) 
        VALUES (?,?,?,?,?,?,?)";
        $arrData = [$nuid,$nombres,$apellidos,$genero,$telefono,$correo,$direccion];
        $requuest_insert = $this->insert($query_insert,$arrData);
        return $requuest_insert;
    }

    public function mostrarPropietarios(){
        $query_select = "SELECT * FROM propietario";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getPropietario($id){
        $query_select = "SELECT * FROM propietario WHERE id = $id";
        $request_select = $this->select($query_select);

        if($request_select){
            echo "Encontrado correctamente.";
        }else{
            echo "No se encontro el propietario seleccionado.";
        }

        return $request_select;
    }

    public function updatePropietario($request_id, $nuid,$nombres,$apellidos,$genero,$telefono,$correo,$direccion){
        $query_update = "UPDATE propietario SET nuid = ?, nombres = ?, apellidos = ?, genero = ?, telefono = ?, correo = ?, direccion = ?, WHERE id = $request_id)";
        $arrData = [$nuid,$nombres,$apellidos,$genero,$telefono,$correo,$direccion];
        $requuest_insert = $this->update($query_update,$arrData);
        if($request_id){
            return $requuest_insert;
        }else{
            echo "Algo salio mal.";
        }
        
    }

    public function removerPropietario($id){
        $query_delete = "DELETE FROM propietario WHERE id = $id";
        $request_delete = $this->delete($query_delete);
        return $request_delete;
    }


}

?>