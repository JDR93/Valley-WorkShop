<?php

require_once "Config/conection.php";

$id = $_POST['id'];
$taller = new Taller();

if (isset($_POST['id'])) {

    $conection = BD::instanciar();
    $result = $conection->prepare("SELECT imagen FROM mecanico WHERE id = $id");
    $result->execute();

    $servicio = $result->fetch(PDO::FETCH_LAZY);
    $txtImagen = $servicio['imagen'];

    if (file_exists("Assets/img/images.perfiles_mecanicos/".$txtImagen)) {
        unlink("Assets/img/images.perfiles_mecanicos/".$txtImagen);
    }

    $taller->removerMecanico($id);
}

echo "Eliminado correctamente.";


?>
