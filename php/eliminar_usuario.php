<?php 
require('conexion.php');

$id = $_GET['id'];

mysqli_query($con, "DELETE FROM usdp_usuarios WHERE id_usuario = '$id'");
mysqli_close($con);
		echo'
		<script type="text/javascript">
    alert("El usuario se a agregado con exito");
 window.location.href="../ugalde.php";
  </script>';
 ?>