
<?php

sleep(1);

require_once "Models/Taller.php";
require_once "Models/Mecanico.php";

$taller = new Taller();

$codigo = $_POST["codigo"];
$nuid = $_POST["nuid"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$genero = $_POST["genero"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];

$imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "imagen.png";
try {

    $fecha = new DateTime();
    if ($imagen != "") {
        $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"];
    } else {
        $nombreArchivo = "imagen.png";
    }

    $tmpImagen = $_FILES["imagen"]["tmp_name"];

    $imagen = $nombreArchivo;
    $mecanico = new Mecanico($nuid, $nombres, $apellidos, $genero, $codigo, $telefono, $correo, $imagen);
    $taller->addMecanico($mecanico);

    if ($tmpImagen != "") {
        move_uploaded_file($tmpImagen, "Assets/img/images.perfiles_mecanicos/" . $nombreArchivo); // move_uploaded_file: Funcion del sistema de archivos
    }

    echo json_encode(['exito' => true, 'mensaje' => " El mecanico fue registrado satisfactoriamente.", "codigo" => $mecanico]);
} catch (Exception $exc) {
    echo json_encode(['error' => true, 'mensaje' => $exc->getMessage()]);
}
