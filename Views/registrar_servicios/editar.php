<?php 

require_once "../../Models/Servicio.php";

$id = $_POST["id"];
$codigo = $_POST["codigo"];
$precio = $_POST["precio"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];

$service = new Servicio();
$result = $service->updateServicio($id, $codigo, $nombre, $precio, $descripcion);

echo "Actualizado satisfactoriamente";


?>