
<?php
require_once "Models/Taller.php";
require_once "Models/Producto.php";

$taller = new Taller();

$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "imagen.png";

try {
    $fecha = new DateTime();
    if ($imagen != "") {
        $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"];
    } else {
        $nombreArchivo = "imagen.png";
    }

    $tmpImagen = $_FILES["imagen"]["tmp_name"];

    if ($tmpImagen != "") {
        move_uploaded_file($tmpImagen, "Assets/img/images.products/" . $nombreArchivo); // move_uploaded_file: Funcion del sistema de archivos
    }

    $imagen = $nombreArchivo;
    $product = new Producto($codigo, $nombre, $descripcion, $precio, $imagen, null);
    $taller->addProducto($product);

    echo json_encode(['exito' => true, 'mensaje' => " El producto fue registrado satisfactoriamente."]);
} catch (Exception $exc) {
    echo json_encode(['error' => true, 'mensaje' => $exc->getMessage()]);
}
