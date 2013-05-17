<?php
//error_reporting(E_ALL ^ E_NOTICE);
require_once("clase/class.php");
if (isset($_SESSION['SEC_USUARIO']))
{

?>
<html>
<head>
<meta charset="utf-8"/>
<title>Sesión iniciada</title>
<link rel="stylesheet" href="css/estilo_1.css"/>
</head>
<body>


<?php
$inst=new saludar;
$nombre=$inst->hola($_SESSION['SEC_USUARIO']);
echo "Bienvenido señor"."&nbsp&nbsp".$nombre[0]['NOMBRE']."";?><br><br>
<a href="salir.php">
<img src="img/logout3.jpg" width="60" title="Salir">
</a>
  

</body>
</html>

<?php
}
else
{
	echo "<script>alert('No existe la seccion');window.location='index.php'</script>";
}

?>
