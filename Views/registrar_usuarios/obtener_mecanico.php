<?php

require_once "Models/Taller.php";
$taller = new Taller();
$id = $_POST['id'];

$mecanico = $taller->getMecanico($id);

$json = array(
    'id'=>$mecanico->id,
    'codigo' => $mecanico->codigo,
    'nuid' => $mecanico->nuid,
    'nombres' => $mecanico->nombres,
    'apellidos' => $mecanico->apellidos,
    'genero' => $mecanico->genero,
    'telefono' => $mecanico->telefono,
    'correo' => $mecanico->correo,
    'imagen' => $mecanico->imagen
);

$jsonString = json_encode($json);
echo $jsonString;
