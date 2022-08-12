<?php 

require('conexion.php');
$fecha = date('Y-m-d');
$hora = date('h:i:s');

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$web = $_POST['web'];



mysqli_query($con, "INSERT INTO usdp_clientes(nombre, direccion, telefono, web, agregado, estatus, fecha_ingreso, hora_ingreso) VALUES ('$nombre', '$direccion', '$telefono', '$web', 'Administrador', '1', '$fecha', '$hora')");
mysqli_close($con);
		echo'
		<script type="text/javascript">
    alert("El cliente se a agregado con exito");
 window.location.href="../ugalde.php";
  </script>';
 ?>