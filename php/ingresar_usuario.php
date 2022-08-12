<?php 

require('conexion.php');
$fecha = date('Y-m-d');
$hora = date('h:i:s');

$nombre = $_POST['nombre'];
$perfil = $_POST['perfil'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$estatus = $_POST['estatus'];


mysqli_query($con, "INSERT INTO usdp_usuarios(nombre, perfil, email, telefono, agregado, estatus, fecha_ingreso, hora_ingreso) VALUES ('$nombre', '$perfil', '$email', '$telefono', 'Administrador', '$estatus', '$fecha', '$hora')");
mysqli_close($con);
		echo'
		<script type="text/javascript">
    alert("El usuario se a agregado con exito");
 window.location.href="../ugalde.php";
  </script>';
 ?>