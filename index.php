<?php
require_once("clase/class.php");

if (isset($_POST['comprobar']) and $_POST['comprobar']=='si')
{
  if (strlen(session_id()) < 1)
 {
	session_start();
}
	//print_r($_POST);
	$inst=new logueo();
	$inst->login();

	exit();
}


?>
<html>
<head>
<meta charset="utf-8"/>
<title>Inicio de seccion</title>
<link rel="stylesheet" type="text/css" href="css/estilo_2.css">
<script type="text/javascript" src="js/md5_1.js"></script>
<script type="text/javascript" src="js/funcion.js"></script>

</head>
<body onload="resestear();">
	<section class="con_todo">
<div id="formulario">
<form name="form1" action="index.php" method="post" class="form">
	<div id="contedor_principal">
	<div id="contenedor1">
	
<label>
Usuario&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
</label>

<label>Contraseña</label><br>

</div>
	<div id="contenedor">
	
	<div id="texto">
<input type="text" name="nombre"/>
<input type="password" name="password"/>

	<input type="hidden" name="comprobar" value="si"/>
	<input class="boton" type="button" value="Entrar" onClick="validar();"/>


</div>


</div>
</div>

</form>

</div>
<div id="contenedor_2">

<img class="imagen"src="img/empresa.jpg " width="300" height="300">


<div id="form_1" >

<form name="form2" action="add_usuario.php" method="post">
<label id="texto"class="texto">Reg&iacute;strate! </label><br><br>
<input type="text"   	name="nombre" class="texto" placeholder="Nombre" size="38" maxlength="30"><br><br>
<input type="text" 	 	name="apellido" class="texto" placeholder="Apell&iacute;dos" size="38"><br><br>
<input type="text"   	name="usuario" class="texto" placeholder="Nombre de Usuario" size="38"><br><br>
<input type="text"   	name="email" class="texto" placeholder="Email" size="38"><br><br>
<input type="password" 	name="password" class="texto" placeholder="Contraseña" size="38"><br><br>
<input type="password" 	name="password_1" class="texto" placeholder="Confirmar Contraseña" size="38"><br><br>
<input class="boton" type="button" value="Reg&iacute;strar" onClick="validar_form2();"/>


</form>
</div>

</div>
<div>
	<p class="doblado"> Este portal es gratis, disfrutalo! </p>
</div>
</section>
<footer id="footer">

</footer>
</body>

</html>
