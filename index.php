<?php 
  include('./php/login.php');
  $title = "1";

  if (isset($_SESSION['login_user_sys'])) {
    header("location: panel.php");
  }
 ?>

<!DOCTYPE html>
<html lang="es-MX">
<?php include('./php/head.php'); ?>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">USDP Login</h2>
        <div class="text-center mb-5 text-dark"><span style="color: red;"><?php echo $error; ?></span></div>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" action="#" method="post">

            <div class="text-center">
              <img src="./assets/images/logo-user.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
                placeholder="Correo electronico" name="username" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" required>
            </div>
            <div class="text-center"><input class="btn btn-primary" name="submit" type="submit" value="Ingresar"></div>
          </form>
          <div class="clear"> </div>
      </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>