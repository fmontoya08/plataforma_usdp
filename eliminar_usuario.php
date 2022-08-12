<?php 
require('./php/conexion.php');

$nombre = $_GET['nombre'];

mysqli_query($con, "DELETE FROM usdp_usuarios WHERE nombre = '$nombre'");
mysqli_query($con, "DELETE FROM usdp_empleados WHERE nombre = '$nombre'");
mysqli_query($con, "DELETE FROM  usdp_login WHERE nombre = '$nombre'");
mysqli_close($con);
		echo'
		<script type="text/javascript">
    alert("El usuario a sido eliminado de la plataforma con exito");
 window.location.href="../usuarios.php";
  </script>';


 ?>