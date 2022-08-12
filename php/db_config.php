<?php
$mysqli = mysqli_connect("localhost","root","","usdp2");

if (mysqli_connect_errno())
  {
  echo "Error al conectarse a la base de datos: " . mysqli_connect_error();
  }
?>