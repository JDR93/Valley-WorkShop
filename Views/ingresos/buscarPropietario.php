<?php


require_once "Config/conection.php";
$valor = $_POST["valor"];

if(!empty($valor)){
    $conexion = BD::instanciar();
    $result = $conexion->query("SELECT * FROM propietario WHERE nuid = $valor");
    $array = $result->fetchAll(PDO::FETCH_OBJ);
    
    if(!$result){
        die('Error de cosulta');
    }
    
    $json = array();

    if($array != null){
        $json[] = (["encontrado"=>true]);
    }else{
        $json[] = (["encontrado"=>false]);

    }

    foreach($array as $row){
        $json[] = array('propietario'=>array(
            'nuid' => $row->nuid,
            'nombres' => $row->nombres,
            'apellidos' => $row->apellidos,
            'genero' => $row->genero,
            'telefono' => $row->telefono,
            'correo' => $row->correo,
            'direccion' => $row->direccion
        ));
    }

    $jsonString = json_encode($json);
    echo $jsonString;
}






?>