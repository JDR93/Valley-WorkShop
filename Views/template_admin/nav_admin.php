<?php

if ($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'Ingresos' || $_SESSION['rol'] == 'Inventario') { ?>

    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="#"><?php echo $_SESSION['rol']; ?></a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name">
                        <strong><?php echo $_SESSION['user']; ?></strong>
                    </span>

                    <?php if ($_SESSION['rol'] == 'Administrador') { ?>
                        <span class="user-role"><?php echo $_SESSION['rol']; ?></span>
                    <?php } else { ?>
                        <span class="user-role">Secretario de <?php echo $_SESSION['rol']; ?></span>
                    <?php } ?>

                    <span class="user-status">
                        <i class="fa fa-circle"></i>
                        <span>Online</span>
                    </span>
                </div>
            </div>
            <!-- sidebar-header  -->



            <div class="sidebar-menu">

                <ul>
                    <?php if ($_SESSION['rol'] != 'Ingresos' || ($_SESSION['rol'] == 'Administrador')) { ?>

                        <li class="header-menu">
                            <span>Mantenimiento</span>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>ingresos">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Ingresos</span>
                                <!-- <span class="badge badge-pill badge-primary">Beta</span> -->
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>asignar">
                                <i class="fa fa-calendar"></i>
                                <span>Asignación</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>productos">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Productos</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>facturacion">
                                <i class="fas fa-receipt"></i>
                                <span>Facturación</span>
                            </a>
                        </li>

                    <?php } ?>

                    <?php if ($_SESSION['rol'] != 'Inventario' || ($_SESSION['rol'] == 'Administrador')) { ?>


                        <li class="header-menu">
                            <span>Registro</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-dolly-flatbed"></i>
                                <span>Inventario</span>
                                <!-- <span class="badge badge-pill badge-warning">New</span> -->
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url() ?>registrar_servicios">Registrar servicios
                                            <!-- <span class="badge badge-pill badge-success">Pro</span> -->
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Registrar productos</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-chart-line"></i>
                                <span>Estadisticas</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Historial de ventas</a>
                                    </li>
                                    <li>
                                        <a href="#">Histograma</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <!-- sidebar-menu  -->







        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-cog"></i>
                <!-- <span class="badge-sonar"></span> -->
            </a>
            <a href="<?php echo base_url() ?>login/cerrar_session">
                <i class="fa fa-power-off"></i>
            </a>
        </div>
    </nav>

<?php } ?>