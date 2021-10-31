<?php

require_once "./Config/conection.php";

function LaPagina($pagina=1)
{
    $artcilos_x_paginas = 6;
    $inicio = ($pagina - 1) * $artcilos_x_paginas;

    $instacia = BD::instanciar();
    $consulta = "SELECT * FROM servicio LIMIT $inicio , $artcilos_x_paginas";
    $result = $instacia->query($consulta);
    $registro = $result->fetchAll(PDO::FETCH_BOTH);

    $i = 0;

    $consulta_completa = "SELECT * FROM servicio";
    $result_completa = $instacia->query($consulta_completa);
    $registro_completa = $result_completa->fetchAll(PDO::FETCH_OBJ);
    $paginas = ceil(count($registro_completa) / $artcilos_x_paginas);

    return ['resultados'=>$registro, 'paginas'=> $paginas];

}

?>