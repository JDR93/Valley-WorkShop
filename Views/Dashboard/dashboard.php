<?php

session_start();

if (empty($_SESSION['user'])) {
    header("Location: http://localhost/valleyworkshop");
}
?>

<?php headerAdmin($data); ?>
<?php footerAdmin($data); ?>