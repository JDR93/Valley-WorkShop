<?php

session_start();

if (empty($_SESSION['user'])) {
    header("Location: http://localhost/valleyworkshop");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $data['page_tag'] ?></title>
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <link rel="stylesheet" href="<?php base_url() ?>Assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php base_url() ?>Assets/css/asignar.css">
    <link rel="stylesheet" href="<?php base_url() ?>Assets/css/ingresos.css">
    <link rel="stylesheet" href="<?php base_url() ?>Assets/css/facturacion.css">
    <link rel="stylesheet" href="<?php base_url() ?>Assets/css/productos.css">

    <?php if ($data['page_name'] == 'Registrar servicio') { ?>
        <link rel="stylesheet" href="<?php base_url() ?>Assets/css/registrar_servicios.css">
    <?php } ?>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="page-wrapper chiller-theme toggled" style="height: 100%;">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>

        <?php require_once "nav_admin.php"; ?>