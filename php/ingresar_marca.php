<?php 

require('conexion.php');
$fecha = date('Y-m-d');
$hora = date('h:i:s');

$cliente = $_POST['cliente'];
$titular = $_POST['titular'];
$descripcion = $_POST['descripcion'];
$marca = $_POST['marca'];
$expediente = $_POST['expediente'];
$registro = $_POST['registro'];



mysqli_query($con, "INSERT INTO usdp_marcas(cliente, titular, descripcion, tipo_marca, n_expediente, n_registro, agregado, estatus, fecha_ingreso, hora_ingreso) VALUES ('$cliente', '$titular', '$descripcion', '$marca', '$expediente', '$registro', 'Administrador', '1', '$fecha', '$hora')");
mysqli_close($con);
		echo'
		<script type="text/javascript">
    alert("La marca se a agregado con exito");
 window.location.href="../ugalde.php";
  </script>';
 ?>