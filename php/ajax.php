<?php 
	$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=usdp', $username, $password ); // Create Object of PDO class by connecting to Mysql database

if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
	
 //This code for Create new Records
 if($_POST["action"] == "Create")
 {
  $statement = $connection->prepare("
   INSERT INTO usdp_usuarios (nombre, perfil, email, telefono, estatus) 
   VALUES (:nombre, :perfil, :email, :telefono, :estatus)
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
   echo 'Data Inserted';
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
   "UPDATE customers 
   SET first_name = :first_name, last_name = :last_name 
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':first_name' => $_POST["firstName"],
    ':last_name' => $_POST["lastName"],
    ':id'   => $_POST["id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }

 if($_POST["action"] == "Delete")
 {
  $statement = $connection->prepare(
   "DELETE FROM customers WHERE id = :id"
  );
  $result = $statement->execute(
   array(
    ':id' => $_POST["id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Deleted';
  }
 }

}

 ?>