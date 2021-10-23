</div>
<!-- page-wrapper -->
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>

<?php if ($data['page_name'] == 'Registrar productos') { ?>
    <script src="<?php base_url() ?>Assets/js/productos.js"></script>
<?php } ?>

<?php if ($data['page_name'] == 'Login administradores') { ?>
    <script src="<?php base_url() ?>Assets/js/functions_login.js"></script>
<?php } ?>

<script src="<?php base_url() ?>Assets/js/dashboard.js"></script>

</body>

</html>