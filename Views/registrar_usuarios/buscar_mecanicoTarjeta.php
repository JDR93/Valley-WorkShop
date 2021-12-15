<?php
require_once "Config/conection.php";

$valor = $_POST["valor"];


if (!empty($valor)) {
    $conexion = BD::instanciar();
    $pdoSta = $conexion->prepare("SELECT * FROM mecanico WHERE nuid = $valor");
    $result = $pdoSta->execute();

    $mecanicos = $pdoSta->fetchAll(PDO::FETCH_OBJ);
    $json = array();

    if ($mecanicos == []) {
        $json = ["encontrado"=>false];
        $jsonString = json_encode($json);
        echo $jsonString;
        return false;
    }

    foreach ($mecanicos as $mecanico) {
        $json[] = array(
            'codigo' => $mecanico->codigo,
            'nuid' => $mecanico->nuid,
            'nombre' => $mecanico->nombres,
            'apellido' => $mecanico->apellidos,
            'genero' => $mecanico->genero,
            'telefono' => $mecanico->telefono,
            'correo' => $mecanico->correo,
            'imagen' => $mecanico->imagen
        );
    }

    $jsonString = json_encode($json);
    echo $jsonString;
}
