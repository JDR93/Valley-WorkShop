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
    <link rel="icon" href="./Assets/img/service.png" type="image/png" />

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <link rel="stylesheet" href="Assets/css/registrar_servicios.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="Assets/css/dashboard.css?v=<?php echo time(); ?>">


    <?php if ($data['page_name'] == 'Ingresar vehiculo') { ?>
        <link rel="stylesheet" href="Assets/css/ingresos.css?v=<?php echo time(); ?>">
    <?php } ?>

    <?php if ($data['page_name'] == 'Asignar mecanico') { ?>
        <link rel="stylesheet" href="Assets/css/asignar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="Assets/css/ingresos.css?v=<?php echo time(); ?>">

    <?php } ?>

    <?php if ($data['page_name'] == 'Registrar productos') { ?>
        <link rel="stylesheet" href="Assets/css/productos.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="Assets/css/ingresos.css?v=<?php echo time(); ?>">
    <?php } ?>

    <link rel="stylesheet" href="Assets/css/productos.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Assets/css/facturacion.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Assets/css/registrar_usuarios.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="page-wrapper chiller-theme toggled" style="height: 100%;">
        <a id="show-sidebar" class="btn btn-sm btn-dark">
            <i style="color: #fff;" class="fas fa-bars"></i>
        </a>

        <?php require_once "nav_admin.php"; ?>