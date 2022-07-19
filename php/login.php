<?php 
	session_start();
	$error = '';
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "El usuario o la contraseña no son correctos";
		}
		else{
			$username = $_POST['username'];
			$password = $_POST['password'];

			include('db.php');
			include('conexion.php');

			$username = mysqli_real_escape_string($con,(strip_tags($username,ENT_QUOTES)));
			$password = sha1($password);

			$sql = "SELECT * FROM usdp_login WHERE email = '" . $username . "' and contrasena='".$password."';";
			$query = mysqli_query($con, $sql);
			$counter = mysqli_num_rows($query);
			if ($counter==1) {
				$_SESSION['login_user_sys'] = $username;
				header("Location: ../panel.php");
			}
			else{
				$error = "El correo electronico o la contraseña es invalida";
			}
		}
	}
 ?>