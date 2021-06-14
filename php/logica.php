<?php
include "../config/conexionbdd.php"; 
	if (isset($_POST['enviar'])) {
		$cedula=$_POST['txtCedula'];
		$nombre=$_POST['txtNombre'];
		$apellido=$_POST['txtApellido'];
		$usuario=$_POST['txtUsuario'];
		$clave=$_POST['txtClave'];
		$telefono=$_POST['txtTelefono'];
		$direccion=$_POST['txtDireccion'];
		$correo=$_POST['txtCorreo'];
		$fecha=$_POST['txtFecha'];

		$bd->query("insert into clientes values ('0','$cedula','$nombre','$apellido','$usuario','$clave','$telefono','$direccion','$correo','$fecha')");
		echo "<script>
		alert('registro exitoso'); 		
		window.location='clientes.php';
		</script>";	
	}	
?>