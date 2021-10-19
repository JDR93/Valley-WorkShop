<!doctype html>
<html lang="en">

<head>
  <title><?php echo $data['page_title']; ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url() ?>/Assets/css/header_navbar.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/Assets/css/ingreso.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/Assets/css/footer_admin.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/Assets/css/asignar.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/Assets/css/navBar.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">

</head>

<body>

  <!--
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand navbar-logo" href="<//?php echo base_url()?>Dashboard">Administrador <//?php echo strtoupper($_SESSION['user']); ?></a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
                <li class="nav-item primer-item">
                    <a class="nav-link" href="javascript:void(0)"><i class="fas fa-home"></i>Inicio</a>
                </li>
                <li class="nav-item primer-item">
                    <a class="nav-link" href="javascript:void(1)"><i class="fas fa-tachometer-alt"></i>Ingresar vehiculo</a>
                </li>
                <li class="nav-item segundo-item">
                    <a class="nav-link" href="javascript:void(1)"><i class="far fa-address-book"></i>Asignar mecanico</a>
                </li>
                <li class="nav-item tecer-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-clone"></i>Registrar pdts utilizados</a>
                </li>
                <li class="nav-item cuarto-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-calendar-alt"></i>Facturación del mantenimiento</a>
                </li>
                <li class="quinto-item">
                    <a class="nav-link" href="<//?php echo base_url()?>Views/Login/cerrar_session.php"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </nav>
-->

  <nav class="navbar">
    <ul class="navbar__menu">
      <li class="navbar__item">
        <a href="<?php echo base_url() ?>Dashboard" class="navbar__link"><i class="fas fa-home"></i><span>Inicio</span class="navbar__link-span"></a>
      </li>
      <li class="navbar__item">
        <a href="<?php echo base_url() ?>Ingresos" class="navbar__link"><i class="fas fa-tachometer-alt"></i><span class="navbar__link-span">Ingresar vehiculo</span></a>
      </li>
      <li class="navbar__item">
        <a href="<?php echo base_url() ?>Asignar" class="navbar__link"><i class="far fa-address-book"></i><span class="navbar__link-span">Asignar mecanico</span></a>
      </li>
      <li class="navbar__item">
        <a href="#" class="navbar__link"><i class="far fa-clone"></i><span class="navbar__link-span">Registrar Pdts</span></a>
      </li>
      <li class="navbar__item">
        <a href="#" class="navbar__link"><i class="far fa-calendar-alt"></i><span class="navbar__link-span">Facturación</span></a>
      </li>
      <li class="navbar__item">
        <a href="<?php echo base_url()?>Views/Login/cerrar_session.php" class="navbar__link"><i class="fas fa-sign-out-alt"></i><span class="navbar__link-span">Cerrar sesión</span></a>
      </li>
    </ul>
  </nav>