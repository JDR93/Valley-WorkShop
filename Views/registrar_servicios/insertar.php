
<?php

sleep(1);

require_once "Models/Taller.php";
require_once "Models/Servicio.php";

$taller = new Taller();

$codigo = $_POST["codigo"];
$precio = $_POST["precio"];
$nombre = $_POST["nombre"];
$imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "imagen.png";
$descripcion = $_POST["descripcion"];

try{



$fecha = new DateTime();
if ($imagen != "") {
    $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"];
} else {
    $nombreArchivo = "imagen.png";
}

$tmpImagen = $_FILES["imagen"]["tmp_name"];

if ($tmpImagen != "") {
    move_uploaded_file($tmpImagen, "Assets/img/images.services/" . $nombreArchivo); // move_uploaded_file: Funcion del sistema de archivos
}

$imagen = $nombreArchivo;
$service = new Servicio($codigo, $nombre, $descripcion, $precio, $imagen, null);
$taller->addServicio($service);

echo json_encode(['exito'=>true, 'mensaje'=>" El servicio fue registrado satisfactoriamente."]);

}catch (Exception $exc){
    echo json_encode(['error'=>true, 'mensaje'=>$exc->getMessage()]);
}


