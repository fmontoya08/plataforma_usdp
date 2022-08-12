<?php 
	require('conexion.php');
$fecha = date('Y-m-d');
$hora = date('h:i:s');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$perfil = $_POST['perfil'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$estatus = $_POST['estatus'];


mysqli_query($con, "UPDATE usdp_usuarios SET nombre='$nombre',perfil='$perfil',email='$email',telefono='$telefono' WHERE id_usuario = '$id'");
mysqli_close($con);
		echo'
		<script type="text/javascript">
    alert("El usuario se a editado con exito");
 window.location.href="../ugalde.php";
  </script>';
 ?>