function resestear()
{
  document.form1.reset();
	document.form2.reset();
}

 

function validar()
{
	var formulario;
	
	formulario=document.form1;
	if (formulario.nombre.value==0)
	{
		alert("El campo nombre es requerido");
		formulario.nombre.focus();
		return false;

	}
	if (formulario.password.value==0)
	{
		alert("El campo password es requerido");
		formulario.password.focus();
		return false;

	}
	formulario.password.value=b64_md5(formulario.password.value);

	formulario.submit();
}

function validar_form2()
{
	var formulario;
	
	formulario=document.form2;
	if (formulario.nombre.value==0)
	{
		alert("El campo nombre es requerido");
		formulario.nombre.focus();
		return false;

	}
	if (formulario.apellido.value==0)
	{
		alert("El campo apellido es requerido");
		formulario.apellido.focus();
		return false;

	}
	
	if (formulario.usuario.value==0)
	{
		alert("El campo usuario es requerido");
		formulario.usuario.focus();
		return false;

	}
	if (formulario.email.value==0)
	{
		alert("El campo email es requerido");
		formulario.email.focus();
		return false;

	}
	
	if (formulario.password.value==0)
	{
		alert("El campo contraseña es requerido");
		formulario.password.focus();
		return false;

	}
	if (formulario.password_1.value==0)
	{
		alert("El campo confirmar contraseña es requerido");
		formulario.password_1.focus();
		return false;

	}
	if (formulario.password.value != formulario.password_1.value)
	{
		alert("Las contraseñas no coinciden");
		formulario.password.focus();
		return false;

	}
	formulario.password.value=b64_md5(formulario.password.value);

	formulario.submit();
}
