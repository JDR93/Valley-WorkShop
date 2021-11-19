<?php
require_once "Config/conection.php";
require_once "Models/Servicio.php";
require_once "Models/Mantenimiento.php";

$servicio = new Servicio();

// VERIFICAR SI EL VEHICULO SE ENCUENTRA EN ALGUN MANTENIMIENTO, SI SÍ SE ENCUENTRA LO CREAMOS 
// Y LUEGO LE AGREGAMOS LOS SERVICIOS SINO HACEMOS LO DE ABAJO

$code_service = $_POST["code_service"];


$array_servicio = $servicio->getServicio($code_service);
if(!empty($code_service)){
    

    foreach($array_servicio as $propiedad){
        $json[] = array(
            'id' => $propiedad->id,
            'codigo' => $propiedad->codigo,
            'nombre' => $propiedad->nombre,
            'costo' => $propiedad->costo,
            'imagen' => $propiedad->imagen,
            'descripcion' => $propiedad->descripcion
        );
    }

    $jsonString = json_encode($json);
    echo $jsonString;
}   


/*


require_once "Models/Mantenimiento.php";
require_once "Models/Servicio.php";

$codeServicio = $_POST["valor"];

$listaServicios = array($codeServicio);

foreach($listaServicios as $i){
    var_dump($i);
}



if (isset($_POST['placa'])) {
    $placaObtenida = $_POST['placa'];

    $taller = new Taller();
    $resultado = $taller->getVehiculo($placaObtenida);

    foreach ($resultado as $veh) {
        $id_vehiculo = $veh->id;
        $placa = $veh->placa;
        $marca = $veh->marca;
        $modelo = $veh->modelo;
        $anio = $veh->anio;
        $tipo = $veh->tipo;
        $id_propietario = $veh->id_propietario;
    }

    $respuesta = $taller->getIDVehiculosMantPendiente();
    foreach ($respuesta as $v) {
        if ($v->id_vehiculo == $id_vehiculo) {
            echo "entre por aqui";
        }
    }

    /*
    //$vehiculo = new Vehiculo($placa, $marca, $modelo, $anio, $tipo, $id_propietario);

    $result = $taller->getServicios($codeServicio = $_POST["valor"]);

    foreach ($result as $serv) {
        $id_servicio = $serv->id;
    }

    $mantenimiento = new Mantenimiento($id_vehiculo);
    $mantenimiento->addServicio($id_servicio);


}
*/

?>