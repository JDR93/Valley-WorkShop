<?php

require_once "Models/Servicio.php";
require_once "Config/conection.php";

$code = $_POST['code'];

if (isset($_POST['code'])) {

    $conection = BD::instanciar();

    $result = $conection->prepare("SELECT imagen FROM servicio WHERE codigo = '$code'");
    $result->execute();

    $servicio = $result->fetch(PDO::FETCH_LAZY);
    $txtImagen = $servicio['imagen'];

    if (file_exists("Assets/img/images.services/".$txtImagen)) {
        unlink("Assets/img/images.services/".$txtImagen);
    }

    $service = new Servicio();
    $result = $service->removerServicio($code);
    if (!$result) {
        die("Ha ocurrido un problema... ");
    }
}

echo "Eliminado correctamente.";


?>
