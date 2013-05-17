<?php
//error_reporting(E_ALL ^ E_NOTICE);
require_once("clase/class.php");
if (isset($_SESSION['SEC_USUARIO']))
{

?>
<html>
<head>
<meta charset="utf-8"/>
<title>Seccion iniciada</title>
<link rel="stylesheet" href="css/estilo.css"/>
</head>
<body>
<h1>Estructura html5<h1>
  <header>
		<div id="print">
		
		</div>
este es el header

	</header>
	<nav>
este es el nav
	</nav>
	<section id="contenedor">
	<section id="principal">
seccion
	<article>
<?php
$inst=new saludar;
$nombre=$inst->hola($_SESSION['SEC_USUARIO']);
echo "Bienvenido señor"."&nbsp&nbsp".$nombre[0]['NOMBRE']."";?><br><br>
<a href="salir.php">Serrar sección</a>
	</article>
	</section>
	<aside>
aside
	</aside>
	</section>
	<footer>
	
pie

</footer>

</body>
</html>

<?php
}
else
{
	echo "<script>alert('No existe la seccion');window.location='index.php'</script>";
}

?>
