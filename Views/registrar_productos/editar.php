
<?php

try {

    require_once "Models/Producto.php";
    require_once "Models/Taller.php";

    $taller = new Taller();

    $id = $_POST["idProduct"];
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $costo = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "imagen.jpg";



    $conection = BD::instanciar();
    $resulth = $conection->prepare("SELECT imagen FROM producto WHERE id = :miID");
    $resulth->execute([":miID" => $id]);

    $imagenResult = $resulth->fetch(PDO::FETCH_LAZY);
    $resultImage = $imagenResult["imagen"];


    $resulth = $conection->prepare("UPDATE producto SET codigo = :miCodigo, nombre = :miNombre, costo = :miCosto, imagen = :miImagen, descripcion = :miDescripcion WHERE id = :miID");
    $resulth->execute([":miCodigo" => $codigo, ":miNombre" => $nombre, ":miCosto" => $costo, ":miImagen" => $resultImage, ":miDescripcion" => $descripcion, ":miID" => $id]);

    if ($imagen != "") {

        if (file_exists("Assets/img/images.products/" . $resultImage)) {
            unlink("Assets/img/images.products/" . $resultImage);
        }

        $fecha = new DateTime();
        $nombreArchivo = ($imagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"] : "imagen.jpg";

        $result = $conection->prepare("SELECT imagen FROM producto WHERE id = '$id'");
        $result->execute();


        $resulth = $conection->prepare("UPDATE producto SET codigo = :miCodigo, nombre = :miNombre, costo = :miCosto, imagen = :miImagen, descripcion = :miDescripcion WHERE id = :miID");
        $resulth->execute([":miCodigo" => $codigo, ":miNombre" => $nombre, ":miCosto" => $costo, ":miImagen" => $nombreArchivo, ":miDescripcion" => $descripcion, ":miID" => $id]);


        $resultImagen = $result->fetch(PDO::FETCH_LAZY);
        $imagenResult = $resultImagen["IMAGEN"];
        $tmpImagen = $_FILES["imagen"]["tmp_name"];

        if ($tmpImagen != "") {
            move_uploaded_file($tmpImagen, "Assets/img/images.products/" . $nombreArchivo);
        }
    }

    echo json_encode(['exito_editado' => true, 'mensaje' => " El producto fue editado correctamente."]);
} catch (Exception $exc) {
    echo json_encode(['error' => true, 'mensaje' => $exc->getMessage(),     ]);
}
