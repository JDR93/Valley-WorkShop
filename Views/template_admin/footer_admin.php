</div>
<!-- page-wrapper -->
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($data['page_name'] == 'Registrar productos') { ?>
    <script src="<?php base_url() ?>Assets/js/productos.js"></script>
<?php } ?>

<?php if ($data['page_name'] == 'Registrar servicio') { ?>
    <script src="<?php base_url() ?>Assets/js/function_file.js"></script>
    <script src="<?php base_url() ?>Assets/js/registrar_servicio.js"></script>
<?php } ?>

<?php if ($data['page_name'] == 'Registrar usuario') { ?>
    <script src="<?php base_url() ?>Assets/js/function_file.js"></script>
    <script src="<?php base_url() ?>Assets/js/registrar_usuarios.js"></script>
<?php } ?>

<?php if ($data['page_name'] == 'Ingresar vehiculo') { ?>
    <script src="<?php base_url() ?>Assets/js/ingresar_vehiculo.js?v=<?php echo time(); ?>"></script>
<?php } ?>

<script src="<?php base_url() ?>Assets/js/side_menu.js"></script>


</body>

</html>