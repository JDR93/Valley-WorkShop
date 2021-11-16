<?php

require_once "./Libraries/Core/MySql.php";


class Propietario extends Mysql {

    private $id;
    private $nuid;
    private $nombres;
    private $apellidos;
    private $genero;
    private $telefono;
    private $correo;
    private $direccion;


    public function __construct($nuid,$nombres,$apellidos,$genero,$telefono,$correo,$direccion)
    {
        parent::__construct();

        $this->nuid = $nuid;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->genero = $genero;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->direccion = $direccion;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function mostrarPropietarios(){
        $query_select = "SELECT * FROM propietario";
        $request_select = $this->selectAll($query_select);
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