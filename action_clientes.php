<?php 
include('./php/session.php');
	$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=usdp', $username, $password ); // Create Object of PDO class by connecting to Mysql database

$fecha = date('Y-m-d');
$hora = date('h:i:s');


if(isset($_POST["action_cliente"])) //Check value of $_POST["action"] variable value is set to not
{
	
 //This code for Create new Records
 if($_POST["action_cliente"] == "Agregar")
 {
  $statement = $connection->prepare("
   INSERT INTO usdp_clientes(nombre, compania, numero_cliente, direccion, direccion_2, ciudad, provincia, cp, pais, rfc, puesto_trabajo, telefono, celular, email, sitio_web, titulo, fecha_ingreso, hora_ingreso, agregado, estatus)
   VALUES (:nombre_cliente, :compania, :numero_cliente, :direccion, :direccion_2, :ciudad, :provincia, :cp, :pais, :rfc, :puesto_trabajo, :telefono_cliente, :celular, :email_cliente, :web, :titulo, '$fecha', '$hora', '$login_session', '1')
  ");
  $result = $statement->execute(
   array(
    ':nombre_cliente' => $_POST["nombre_cliente"],
    ':compania' => $_POST["compania"],
    ':numero_cliente' => $_POST["numero_cliente"],
    ':direccion' => $_POST["direccion"],
    ':direccion_2' => $_POST["direccion_2"],
    ':ciudad' => $_POST["ciudad"],
    ':provincia' => $_POST["provincia"],
    ':cp' => $_POST["cp"],
    ':pais' => $_POST["pais"],
    ':rfc' => $_POST["rfc"],
    ':puesto_trabajo' => $_POST["puesto_trabajo"],
    ':telefono_cliente' => $_POST["telefono_cliente"],
    ':celular' => $_POST["celular"],
    ':email_cliente' => $_POST["email_cliente"],
    ':web' => $_POST["web"],
    ':titulo' => $_POST["titulo"]
   )
  );
  if(!empty($result))
  {
   echo 'La informacion se a añadido con exito !';
  }
 }

 //     if($_POST["action"] == "Select")
 // {
 //  $output = array();
 //  $statement = $connection->prepare(
 //   "SELECT * FROM usdp_usuarios 
 //   WHERE id_usuario = '".$_POST["id"]."' 
 //   LIMIT 1"
 //  );
 //  $statement->execute();
 //  $result = $statement->fetchAll();
 //  foreach($result as $row)
 //  {
 //   $output["nombre"] = $row["nombre"];
 //   $output["perfil"] = $row["perfil"];
 //   $output["email"] = $row["email"];
 //   $output["telefono"] = $row["telefono"];
 //   $output["estatus"] = $row["estatus"];

 //  }
 //  echo json_encode($output);
 // }

 // if($_POST["action"] == "Update")
 // {
 //  $statement = $connection->prepare(
 //   "UPDATE usdp_usuarios 
 //   SET nombre = :nombre, perfil = :perfil, email = :email, telefono = :telefono, estatus = :estatus 
 //   WHERE id_usuario = :id
 //   "
 //  );
 //  $result = $statement->execute(
 //   array(
 //    ':nombre' => $_POST["nombre"],
 //    ':perfil' => $_POST["perfil"],
 //    ':email'   => $_POST["email"],
 //    ':telefono' => $_POST["telefono"],
 //    ':estatus' => $_POST["estatus"],
 //    ':id'   => $_POST["id"]
 //   )
 //  );
 //  if(!empty($result))
 //  {
 //   echo 'El registro se a actualizado correctamente!';
 //  }
 // }

 if($_POST["action_cliente"] == "Delete")
 {
  $statement = $connection->prepare(
   "DELETE FROM usdp_clientes WHERE id_cliente = :id"
  );
  $result = $statement->execute(
   array(
    ':id_' => $_POST["id"]
   )
  );
  if(!empty($result))
  {
   echo 'Registro eliminado con exito!';
  }
 }

}

 ?>