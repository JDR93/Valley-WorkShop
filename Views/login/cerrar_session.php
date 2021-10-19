<?php
sleep(1);

session_start();
session_destroy();
header( 'Location: http://localhost/valleyworkshop') ;

?>