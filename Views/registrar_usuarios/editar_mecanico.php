
<?php

try {

    require_once "Models/Taller.php";

    $taller = new Taller();

    $id = $_POST["idService"];
    $codigo = $_POST["codigo"];
    $nuid = $_POST["nuid"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $genero = $_POST["genero"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "imagen.jpg";

    $conection = BD::instanciar();
    $resulth = $conection->prepare("SELECT imagen FROM mecanico WHERE id = :miID");
    $resulth->execute([":miID" => $id]);

    $imagenResult = $resulth->fetch(PDO::FETCH_LAZY);
    $resultImage = $imagenResult["imagen"];


    $resulth = $conection->prepare("UPDATE mecanico SET codigo = :miCodigo, nuid = :miNuid, nombres = :miNombres, apellidos = :miApellidos, genero = :miGenero, telefono = :miTelefono, correo = :miCorreo, imagen = :miImagen WHERE id = :miID");
    $resulth->execute([":miCodigo" => $codigo, ":miNuid" => $nuid, ":miNombres" => $nombres, ":miApellidos" => $apellidos, ":miGenero" => $genero, ":miTelefono" => $telefono, ":miCorreo" => $correo, ":miImagen" => $resultImage, ":miID" => $id]);

    if ($imagen != "") {

        if (file_exists("Assets/img/images.perfiles_mecanicos/" . $resultImage)) {
            unlink("Assets/img/images.perfiles_mecanicos/" . $resultImage);
        }

        $fecha = new DateTime();
        $nombreArchivo = ($imagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"] : "imagen.jpg";

        $result = $conection->prepare("SELECT imagen FROM mecanico WHERE id = '$id'");
        $result->execute();

        $resulth = $conection->prepare("UPDATE mecanico SET codigo = :miCodigo, nuid = :miNuid, nombres = :miNombres, apellidos = :miApellidos, genero = :miGenero, telefono = :miTelefono, correo = :miCorreo, imagen = :miImagen WHERE id = :miID");
        $resulth->execute([":miCodigo" => $codigo, ":miNuid" => $nuid, ":miNombres" => $nombres, ":miApellidos" => $apellidos, ":miGenero" => $genero, ":miTelefono" => $telefono, ":miCorreo" => $correo, ":miImagen" => $resultImage, ":miID" => $id]);

        $resultImagen = $result->fetch(PDO::FETCH_LAZY);
        $imagenResult = $resultImagen["IMAGEN"];
        $tmpImagen = $_FILES["imagen"]["tmp_name"];

        if ($tmpImagen != "") {
            move_uploaded_file($tmpImagen, "Assets/img/images.perfiles_mecanicos/" . $nombreArchivo);
        }
    }

    echo json_encode(['exito_editado' => true, 'mensaje' => " El mecanico fue editado correctamente."]);
} catch (Exception $exc) {
    echo json_encode(['error' => true, 'mensaje' => $exc->getMessage()]);
}
