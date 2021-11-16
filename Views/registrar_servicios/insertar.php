
<?php

try {



    require_once "Models/Servicio.php";

    $codigo = $_POST["codigo"];
    $precio = $_POST["precio"];
    $nombre = $_POST["nombre"];
    $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "imagen.png";
    $descripcion = $_POST["descripcion"];



    $service = new Servicio();
    $serviceRegistrado = $service->comprobarServicioCode($codigo);
    if ($serviceRegistrado != 0) {
        throw new Exception("El servicio con codigo  <span style='color: orange;'> $codigo </span>  ya se encuentra registrado. ");
    }

    $serviceRegistrado = $service->comprobarServicioNombre($nombre);
    if ($serviceRegistrado != 0) {
        throw new Exception("El servicio con nombre <span style='color: orange;'> $nombre </span> ya se encuentra registrado. ");
    }


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

    $insercion = $service->insertarServicio($codigo, $nombre, $descripcion, $precio, $imagen);

    echo "El servicio fue registrado satisfactoriamente.";
} catch (Exception $exc) {
    echo $exc->getMessage();
}
