<?php

require_once "Models/Servicio.php";
require_once "Config/conection.php";

$code = $_POST['code'];
$taller = new Taller();

if (isset($_POST['code'])) {

    $conection = BD::instanciar();
    $result = $conection->prepare("SELECT imagen FROM servicio WHERE codigo = '$code'");
    $result->execute();

    $servicio = $result->fetch(PDO::FETCH_LAZY);
    $txtImagen = $servicio['imagen'];

    if (file_exists("Assets/img/images.services/".$txtImagen)) {
        unlink("Assets/img/images.services/".$txtImagen);
    }

    $taller->removerServicio($code);
}

echo "Eliminado correctamente.";


?>
