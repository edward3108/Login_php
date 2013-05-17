<?php
require_once("clase/class.php");

$inst= new insertar_usuario;
$inst->insertar($_POST['nombre'],$_POST['password'],$_POST['apellido'],$_POST['usuario'],$_POST['email']);

?>
