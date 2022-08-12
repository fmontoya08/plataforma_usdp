 <?php 
    require('conexion.php');
    $id = $_GET['id'];


    $query = "SELECT * FROM usdp_usuarios WHERE id_usuario = '$id'";
    $consulta = mysqli_query($con, $query);
    $row = mysqli_fetch_array($consulta);
  ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="editar_usuario2.php" method="POST">
        <label>id</label>
    <input type="text" name="id" value="<?php echo $row['id_usuario']; ?>" class="form-control" />
    <label>Nombre</label>
    <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" class="form-control" />
    <br />
    <label>Perfil</label>
    <input type="text" name="perfil" value="<?php echo $row['perfil']; ?>" class="form-control" />
    <br />
    <label>Correo electronico</label>
    <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control" />
    <br />
    <label>Telefono</label>
    <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" class="form-control" />
    <br />
    <label>Estatus</label>
    <input type="text" name="estatus" value="<?php echo $row['estatus']; ?>" class="form-control" value="1" readonly />
   </div>
    <input type="submit" value="editar">
    </form>
</body>
</html>

  