<?php

require_once "Models/Producto.php";
require_once "Config/conection.php";

$code = $_POST['code'];
$taller = new Taller();

if (isset($_POST['code'])) {

    $conection = BD::instanciar();
    $result = $conection->prepare("SELECT imagen FROM producto WHERE codigo = '$code'");
    $result->execute();

    $producto = $result->fetch(PDO::FETCH_LAZY);
    $txtImagen = $producto['imagen'];

    if (file_exists("Assets/img/images.products/".$txtImagen)) {
        unlink("Assets/img/images.products/".$txtImagen);
    }

    $taller->removerProducto($code);
}

echo "Eliminado correctamente.";


?>
