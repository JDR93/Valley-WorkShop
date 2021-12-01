<?php

require_once "./Models/Mantenimiento.php";
require_once "./Models/Vehiculo.php";
require_once "./Models/Servicio.php";
require_once "./Config/conection.php";

$taller = new Taller();

$propietario = new Propietario(192912,'jj','dd','M','29292','correo','direccion');


var_dump($propietario->nuid);

$id_propietario = $taller->addPropietario($propietario);

$array = $taller->propietarios;
var_dump($array);


