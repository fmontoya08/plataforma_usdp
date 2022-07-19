<?php 
	$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=crud', $username, $password ); // Create Object of PDO class by connecting to Mysql database

if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
	 if($_POST["action"] == "Select")
 {
  $output = array();
  $statement = $connection->prepare(
   "SELECT * FROM customers 
   WHERE id = '".$_POST["id"]."' 
   LIMIT 1"
  );
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output["first_name"] = $row["first_name"];
   $output["last_name"] = $row["last_name"];
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
}
 ?>