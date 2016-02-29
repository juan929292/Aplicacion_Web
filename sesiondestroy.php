<?php 
session_start();
include_once("\Aplicacion_Web\db_configuration.php");
session_destroy();
header("Location: login.php");
?>
