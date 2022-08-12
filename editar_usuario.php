<?php 
    include('./php/session.php');
    require_once('./php/db.php');
    require_once('./php/conexion.php');
    include_once './php/config.inc.php';
    $title = '4';
    $fecha = date('Y-m-d');
$hora = date('h:i:s');
$nombre = $_GET['nombre'];

$query_consulta_usuario = "SELECT * FROM usdp_empleados WHERE nombre = '$nombre'";
    $consulta_usuario = mysqli_query($con, $query_consulta_usuario);
    $row_usuario = mysqli_fetch_array($consulta_usuario);

    $query_consulta_usuario3 = "SELECT * FROM usdp_usuarios WHERE nombre = '$nombre'";
    $consulta_usuario3 = mysqli_query($con, $query_consulta_usuario3);
    $row_usuario3 = mysqli_fetch_array($consulta_usuario3);

        $query_consulta_usuario4 = "SELECT * FROM usdp_login WHERE nombre = '$nombre'";
    $consulta_usuario4 = mysqli_query($con, $query_consulta_usuario4);
    $row_usuario4 = mysqli_fetch_array($consulta_usuario4);

$nombre_usuario = $row_usuario['nombre'];

    $query_consulta_usuario2 = "SELECT * FROM usdp_documentos WHERE titulo = '$nombre_usuario'";
    $consulta_usuario2 = mysqli_query($con, $query_consulta_usuario2);
    $row_usuario2 = mysqli_fetch_array($consulta_usuario2);

    // include_once 'config.inc.php';
    if (isset($_POST['subir'])) {
        // $nombre = $_FILES['archivo']['name'];
        // $tipo = $_FILES['archivo']['type'];
        // $tamanio = $_FILES['archivo']['size'];
        // $ruta = $_FILES['archivo']['tmp_name'];
        // $destino = "archivos/" . $nombre;
        // if ($nombre != "") {
        //     if (copy($ruta, $destino)) {
            $nombre_usuario = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $perfil = $_POST['perfil'];
            $departamento = $_POST['departamento'];
            $puesto = $_POST['puesto'];
            $pass = $_POST['pass'];
            $password = sha1($pass);
                $db=new Conect_MySql();
                // $sql = "INSERT INTO usdp_documentos(titulo,descripcion,tamanio,tipo,nombre_archivo) VALUES('$nombre_usuario','$email','$tamanio','$tipo','$nombre')";
                $sql2 = "UPDATE usdp_login SET nombre='$nombre_usuario',email='$email'WHERE nombre = '$nombre'";
                $sql3 = "UPDATE usdp_empleados SET nombre='$nombre_usuario',direccion='$direccion',telefono='$telefono',email='$email',departamento='$departamento',puesto='$puesto' WHERE nombre = '$nombre'";
                $sql4 = "UPDATE usdp_usuarios SET nombre='$nombre_usuario',perfil='$perfil',email='$email',telefono='$telefono' WHERE nombre = '$nombre'";    
                // $query = $db->execute($sql);
                $query2 = $db->execute($sql2);
                $query3 = $db->execute($sql3);
                $query4 = $db->execute($sql4);
                // if($query){
                    if ($query2) {
                        if ($query3) {
                            if ($query4) {
                                echo'
                                    <script type="text/javascript">
                                alert("Se a agregado con exito");
                             window.location.href="./usuarios.php";
                              </script>';
                            }
                        }
                    }
                // }
                else {
                echo "Error";
            }
            // } 
        // }


        // echo $nombre;
        // echo $direccion;
        // echo $email;
        // echo $telefono;
        // echo $perfil;
        // echo $departamento;
        // echo $puesto;
        // echo $pass;
        // echo $rpass;
    }

 ?>
<!DOCTYPE html>
<html dir="ltr" lang="es-MX">

<?php include('./php/head.php'); ?>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php include('./php/header.php'); ?>
        <?php include('./php/menu.php'); ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                              <li class="breadcrumb-item active" aria-current="page">Agregar nuevo empleado</li>
                              
                            </ol>
                          </nav>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <h2>Editar la informacion del empleado</h2>
                    <!-- Column -->
                    <!-- <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="./archivos/<?php echo $row_usuario2['nombre_archivo'] ?>"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10"></h4>
                                    <h6 class="card-subtitle"></h6>
                                    <div class="row text-center justify-content-md-center">
                                       <input type="file" name="archivo">
                                    </div>
                                    
        
                                </center>
                            </div>
                           
                        </div>
                    </div> -->
                    <!-- Column -->
                    <!-- Column -->
                                <form class="form-horizontal form-material mx-2"  method="post" action="" enctype="multipart/form-data">
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Nombre</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="nombre" value="<?php echo $row_usuario['nombre']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Direccion del trabajo</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line"
                                                id="example-email" name="direccion" value="<?php echo $row_usuario['direccion']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">
                                        Correo electronico</label>
                                        <div class="col-md-12">
                                            <input type="text"
                                                class="form-control form-control-line" name="email" value="<?php echo $row_usuario['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Telefono</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="telefono" value="<?php echo $row_usuario['telefono']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Perfil</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="perfil" value="<?php echo $row_usuario3['perfil']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Departamento</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="departamento" value="<?php echo $row_usuario['departamento']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Puesto de trabajo</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="puesto" value="<?php echo $row_usuario['puesto']; ?>">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label class="col-md-12">Contraseña</label>
                                              <input type="password" name="pass" class="form-control" placeholder="Quieres cambiar de contraseña? Escribela aqui" >
                                            </div>
                                            
                                          </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="submit" value="subir" name="subir">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                
            </div>

            






            <?php include('./php/footer.php'); ?>

        </div>
    </div>

    <?php include('./php/script.php'); ?>
  
</body>

</html>