<?php 
  include('./php/login.php');

  if (isset($_SESSION['login_user_sys'])) {
    header("location: panel.php");
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<?php include('./php/head.php'); ?>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Login Form</h2>
        <div class="text-center mb-5 text-dark">Made with bootstrap</div>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" action="#" method="post">

            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
                placeholder="User Name" name="username" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
            </div>
            <div class="text-center"><input name="submit" type="submit" value="Ingresar"></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
              Registered? <a href="#" class="text-dark fw-bold"> Create an
                Account</a>
            </div>
          </form>
          <div class="clear"> </div>
        <span><?php echo $error; ?></span>
      </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>