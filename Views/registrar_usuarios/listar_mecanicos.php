<?php

require_once "Models/Taller.php";

$taller = new Taller();
$mecanicos = $taller->mecanicos;

$json = array();

foreach ($mecanicos as $mecanico) {
    $json[] = array(
        'codigo' => $mecanico->codigo,
        'nuid' => $mecanico->nuid,
        'nombre' => $mecanico->nombres . " " . $mecanico->apellidos,
        'telefono' => $mecanico->telefono,
        'correo' => $mecanico->correo,
        'imagen' => $mecanico->imagen
    );
}

$jsonString = json_encode($json);
echo $jsonString;
