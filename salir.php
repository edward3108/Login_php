<?php
require_once("clase/class.php");
session_register('SEC_USUARIO');
session_destroy();
header('location:index.php');
?>
