<?php

require_once "../../Models/Servicio.php";

$codigo = $_POST["codigo"];
$precio = $_POST["precio"];
$nombre = $_POST["nombre"];
$imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "imagen.jpg";
$descripcion = $_POST["descripcion"];

if (!(empty($_POST["codigo"]) || empty($_POST["nombre"]) || empty($_POST["descripcion"]) || empty($_POST["precio"]) )){

/*
    $fecha = new DateTime();
    if ($imagen != "") {
        $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"];
    } else {
        $nombreArchivo = "imagen.jpg";
    }


    $tmpImagen = $_FILES["imagen"]["tmp_name"];

    if ($tmpImagen != "") {
        move_uploaded_file($tmpImagen, "./Assets/img/images.services/" . $nombreArchivo); // move_uploaded_file: Funcion del sistema de archivos
    }

    $imagen = $nombreArchivo;
*/
    $service = new Servicio();
    $insercion = $service->insertarServicio($codigo, $nombre, $descripcion, $precio, $imagen);
    
    if(!$insercion){
        die ("Algo fallo...");
    }
    echo "Servicio insertado";
    
} else {
    echo json_encode(['error' => true]);
}


?>
