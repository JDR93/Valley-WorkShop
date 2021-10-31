<?php 
include "function.php";

$numero = $_POST['numero'];
$respuesta = LaPagina($numero);
echo json_encode($respuesta);

?>
