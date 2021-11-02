<?php 

require_once "../../Models/Servicio.php";

if(isset($_POST['code'])){
    $code = $_POST['code'];

    $service = new Servicio();
    $result = $service->removerServicio($code);
    if(!$result){
        die("Ha ocurrido un problema... ");
    }
    echo "Eliminado satisfactoriamente.";
}

?>

