<?php
require_once "Config/conection.php";

$valor = $_POST["valor"];

if(!empty($valor)){
    $conexion = BD::instanciar();
    $result = $conexion->query("SELECT * FROM producto WHERE nombre LIKE '$valor%' OR codigo LIKE '$valor%' ");
    $array = $result->fetchAll(PDO::FETCH_OBJ);
    
    if(!$result){
        die('Error de cosulta');
    }
    
    $json = array();

    foreach($array as $row){
        $json[] = array(
            'codigo' => $row->codigo,
            'nombre' => $row->nombre,
            'costo' => $row->costo,
            'imagen' => $row->imagen,
            'descripcion' => $row->descripcion
        );
    }

    $jsonString = json_encode($json);
    echo $jsonString;
}

?>