<?php
require_once "Config/conection.php";

$valor = $_POST["valor"];

if(!empty($valor)){
    $conexion = BD::instanciar();
    $result = $conexion->query("SELECT * FROM mecanico WHERE nuid = $valor");
    $mecanicos = $result->fetchAll(PDO::FETCH_OBJ);
    
    if(!$result){
        die('Error de cosulta');
    }
    
    $json = array();

    foreach($mecanicos as $mecanico){
        $json[] = array(
            'codigo' => $mecanico->codigo,
            'nuid' => $mecanico->nuid,
            'nombre' => $mecanico->nombres,
            'apellido'=> $mecanico->apellidos,
            'genero'=> $mecanico->genero,
            'telefono' => $mecanico->telefono,
            'correo' => $mecanico->correo,
            'imagen' => $mecanico->imagen
        );
    }

    $jsonString = json_encode($json);
    echo $jsonString;
}

?>