<?php

require_once "./models/Propietario.php";
require_once "./models/Mantenimiento.php";
require_once "./models/Vehiculo.php";

// DATOS DEL PROPIETARIO
$nuid = $_POST['nuid'];
$nombre = $_POST['nombre']; 
$apellido = $_POST['apellido'];
$genero = $_POST['genero'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

$p = new Propietario();
$lastInsert = $p->insertarPropietario($nuid,$nombre,$apellido,$genero,$telefono,$correo,$direccion);



// DATOS DEL VEHICULO
$placa = $_POST['placa'];
$marca = $_POST['marca']; 
$linea = $_POST['linea'];
$anio = $_POST['modelo'];
$tipo = $_POST['tipo'];
$id_propietario = $lastInsert;

$v = new Vehiculo();
$id_vehiculo = $v->insertarVehiculo($placa,$marca,$linea,$anio,$tipo,$id_propietario);


$m = new Mantenimiento(); //state : P => pendiente ; R => realizado
$m->insertarMantenimiento('P',$id_vehiculo);

echo "INSERTADOS CORRECTAMENTE.";

?>