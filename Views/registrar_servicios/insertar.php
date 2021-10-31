<?php
require_once "./Models/Servicio.php";


$codigo = $_POST["txtCodigo"];
$nombre = $_POST["txtNombre"];
$descripcion = $_POST["txtDesc"];
$costo = $_POST["txtCosto"];
$estado = (!empty($_POST["txtEstado"])) ? $_POST["txtEstado"] : 'off' ;


$imagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "imagen.jpg";



if (!(empty($_POST["txtCodigo"]) || empty($_POST["txtNombre"]) || empty($_POST["txtDesc"]) || empty($_POST["txtCosto"]) )){


    $fecha = new DateTime();
    if ($imagen != "") {
        $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"];
    } else {
        $nombreArchivo = "imagen.jpg";
    }


    $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

    if ($tmpImagen != "") {
        move_uploaded_file($tmpImagen, "./Assets/img/images.services/" . $nombreArchivo); // move_uploaded_file: Funcion del sistema de archivos
    }

    $service = new Servicio();
    $imagen = $nombreArchivo;
    $insercion = $service->insertarServicio($codigo, $nombre, $descripcion, $costo, $imagen, $estado);
    
    echo json_encode(['codigo' => $codigo,'nombre' => $nombre,'descripcion' => $descripcion,'costo' => $costo,'imagen' => $imagen, 'estado'=>$estado]);
} else {
    echo json_encode(['error' => true]);
}
