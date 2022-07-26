<?php 
include('./php/session.php');
	$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=usdp', $username, $password ); // Create Object of PDO class by connecting to Mysql database

$fecha = date('Y-m-d');
$hora = date('h:i:s');


if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
	
 //This code for Create new Records
 if($_POST["action"] == "Agregar")
 {
  $statement = $connection->prepare("
   INSERT INTO usdp_usuarios (nombre, perfil, email, telefono, estatus, agregado, fecha_ingreso, hora_ingreso) 
   VALUES (:nombre, :perfil, :email, :telefono, :estatus, '$login_session', '$fecha', '$hora')
  ");
  $result = $statement->execute(
   array(
    ':nombre' => $_POST["nombre"],
    ':perfil' => $_POST["perfil"],
    ':email' => $_POST["email"],
    ':telefono' => $_POST["telefono"],
    ':estatus' => $_POST["estatus"]
   )
  );
  if(!empty($result))
  {
   echo 'La informacion de a añadido con exito !';
  }
 }

     if($_POST["action"] == "Select")
 {
  $output = array();
  $statement = $connection->prepare(
   "SELECT * FROM usdp_usuarios 
   WHERE id_usuario = '".$_POST["id"]."' 
   LIMIT 1"
  );
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output["nombre"] = $row["nombre"];
   $output["perfil"] = $row["perfil"];
   $output["email"] = $row["email"];
   $output["telefono"] = $row["telefono"];
   $output["estatus"] = $row["estatus"];

  }
  echo json_encode($output);
 }

 if($_POST["action"] == "Update")
 {
  $statement = $connection->prepare(
   "UPDATE usdp_usuarios 
   SET nombre = :nombre, perfil = :perfil, email = :email, telefono = :telefono, estatus = :estatus 
   WHERE id_usuario = :id
   "
  );
  $result = $statement->execute(
   array(
    ':nombre' => $_POST["nombre"],
    ':perfil' => $_POST["perfil"],
    ':email'   => $_POST["email"],
    ':telefono' => $_POST["telefono"],
    ':estatus' => $_POST["estatus"],
    ':id'   => $_POST["id"]
   )
  );
  if(!empty($result))
  {
   echo 'El registro se a actualizado correctamente!';
  }
 }

 if($_POST["action"] == "Delete")
 {
  $statement = $connection->prepare(
   "DELETE FROM usdp_usuarios WHERE id_usuario = :id"
  );
  $result = $statement->execute(
   array(
    ':id' => $_POST["id"]
   )
  );
  if(!empty($result))
  {
   echo 'Registro eliminado con exito!';
  }
 }

}

 ?>