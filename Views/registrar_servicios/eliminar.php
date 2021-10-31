<?php 

require_once "./Models/Servicio.php";

$id = $_POST['eliminar'];
echo json_encode(['id'=>$id]);

$service = new Servicio();
$service->removerServicio($id);


?>