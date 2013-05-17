<?php

 class conectar 
{
  
	public static function conexion()
	{	
		$server="localhost";
		$usuario="root";
		$password="";
		$db="libreria";
		$con=mysql_connect($server,$usuario,$password);
		mysql_query("set names 'utf8'");
		mysql_select_db($db);
		return $con;
	}
}

/**
* //fin clase conectar..............................................................
*/
class logueo 
{
	
	public function login()
	{
		$nombre=$_POST['nombre'];
		$pas_js=$_POST['password'];
		$pas_php=md5($_POST['password']);
		
		$sql="SELECT *FROM usuarios WHERE USUARIO='$nombre' and pas_js='$pas_js' and pas_php='$pas_php'";
		$ejecutar=mysql_query($sql,conectar::conexion());
		if (mysql_num_rows($ejecutar)==0)
		{
			echo "<script>alert('Usted no se ha registrado en la base de datos. Registrate!');
			window.location='index.php';</script>";

		}
		else 
		{
			if ($reg=mysql_fetch_array($ejecutar)){

				$_SESSION['SEC_USUARIO']=$reg['ID_USUARIO'];
				header('location: sesion.php');
			}

			
		}
		
	}

}


//fin clase login..............................................................
class saludar
{
	private $nombre=array();
	
	public function hola($ID_USUARIO)
	{
		$sql="SELECT *FROM usuarios WHERE ID_USUARIO='$ID_USUARIO'";
			$ejecutar=mysql_query($sql,conectar::conexion());
			while ($reg=mysql_fetch_assoc($ejecutar)) {
				$this->nombre[]=$reg;
				
			}
			return $this->nombre;

	}


}
//fin clase saludar.............................................................

class insertar_usuario
{
	
	function insertar($nom,$pas_js,$ape,$uid,$email)
	{	//header("Content-Type: text/html; charset=utf-8");

		$sql1="SELECT *FROM usuarios WHERE USUARIO='$uid'";
		$ejecutar1=mysql_query($sql1,conectar::conexion());
		if (mysql_num_rows($ejecutar1)==1)
		{
			echo "<script>
				alert('Disculpe los inconvenientes pero este usuario ya ha sido usado, elija otro nombre de usuario');
				window.location='index.php';

			</script>";

		}
		else {
		$fecha=date("d/m/Y");
		$pas_php=md5($pas_js);
		$sql= "INSERT INTO usuarios (NOMBRE,pas_js,pas_php,CORREO,USUARIO,FECHA,APELLIDOS) values('$nom','$pas_js','$pas_php','$email','$uid','$fecha','$ape')";
		$ejecutar=mysql_query($sql,conectar::conexion());
		
		echo "<script type=text/javascript>
 			alert('Usuario agregado ya puede usar su cuenta');
 			window.location='index.php';

		</script>"	;
		
		}
	}
}
?>
