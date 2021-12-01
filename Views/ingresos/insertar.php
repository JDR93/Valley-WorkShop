<?php

sleep(1);

try {

    require_once "Models/Taller.php";
    $taller = new Taller();

    // OBTENIENDO DATOS DEL PROPIETARIO
    $identificacion = $_POST['identificacion'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $genero = $_POST['genero'];;
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];

    $propietario = new Propietario($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
    
    // OBTENIENDO DATOS DEL VEHICULO
    $placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $linea = $_POST['linea'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];

    
    $vehiculo = new Vehiculo($placa, $marca, $modelo, $linea, $tipo, $propietario);
    $idVeh = $taller->addVehiculo($vehiculo);

    $json = (["insertado" => true,"vehiculo"=>$vehiculo->placa]);
    $jsonString = json_encode($json);
    echo ($jsonString);
} catch (Exception $exc) {
    $json = (["error" => true, "mensaje" => $exc->getMessage()]);
    $jsonString = json_encode($json);
    echo ($jsonString);
}

/*

$propietario = new Propietario($identificacion,$nombres,$apellidos,$genero,$telefono,$correo,$direccion);
$id_propietario = $taller->addPropietario($propietario);



echo json_encode(['registrado'=>true, 'id_vehiculo'=>$id_vehiculo]);

/*
require_once "Models/Mantenimiento.php";
require_once "Models/Servicio.php";
require_once "Models/Propietario.php";
require_once "Models/Vehiculo.php";



$json = array($identificacion, $placa);
$jsonString = json_encode($json);
echo $jsonString;

/*

//$lastInsert = $p->insertarPropietario((int)$identificacion,$nombres,$apellidos,$genero,$telefono,$correo,$direccion);


$propietario = new Propietario($identificacion, $nombres, $apellidos, $genero, $telefono, $correo, $direccion);
$vehiculo = new Vehiculo($placa, $marca, $linea, $anio, $tipo, $propietario);

$s1 = new Servicio(1001, 'Cambio de pintura', 'Hermoso design', 1250000, 'imagen.jpg', 'Disponible');
$s2 = new Servicio(1002, 'Cambio de pintura', 'Hermoso design', 1250000, 'imagen.jpg', 'Disponible');
$s3 = new Servicio(1003, 'Cambio de pintura', 'Hermoso design', 1250000, 'imagen.jpg', 'Disponible');

$servicios = array();

$m = new Mantenimiento('P',null,$vehiculo);

$m->agregarServicio($s1);
$m->agregarServicio($s2);
$m->agregarServicio($s3);

#echo $m->Vehiculo->placa;



echo $_POST["valor"];

#$lastID_mantenimiento = $m->insertarMantenimiento('P',$id_vehiculo);
#$m->insertarMantenimientoServicio($lastID_mantenimiento, )

$p = new Propietario();
#echo $lastInsert;

$id_vehiculo = $v->insertarVehiculo($placa,$marca,$linea,$anio,$tipo,$id_propietario);
#echo "INSERTADOS CORRECTAMENTE.";

*/
