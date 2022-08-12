<?php 
    include('./php/session.php');
    require_once('./php/db.php');
    require_once('./php/conexion.php');
    include_once './php/config.inc.php';
    $title = '4';
    $fecha = date('Y-m-d');
$hora = date('h:i:s');


    // include_once 'config.inc.php';
    if (isset($_POST['subir'])) {
        // $nombre = $_FILES['archivo']['name'];
        // $tipo = $_FILES['archivo']['type'];
        // $tamanio = $_FILES['archivo']['size'];
        // $ruta = $_FILES['archivo']['tmp_name'];
        // $destino = "archivos/" . $nombre;
        // if ($nombre != "") {
            // if (copy($ruta, $destino)) {
            $nombre_usuario = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $perfil = $_POST['perfil'];
            $departamento = $_POST['departamento'];
            $puesto = $_POST['puesto'];
            $pass = $_POST['pass'];
            $rpass = $_POST['rpass'];
            $password = sha1($pass);
                $db=new Conect_MySql();
                // $sql = "INSERT INTO usdp_documentos(titulo,descripcion,tamanio,tipo,nombre_archivo) VALUES('$nombre_usuario','$email','$tamanio','$tipo','$nombre')";
                $sql2 = "INSERT INTO usdp_login(nombre, contrasena, email, fecha_registro, hora_registro) VALUES('$nombre_usuario','$password','$email','$fecha','$hora')";
                $sql3 = "INSERT INTO usdp_empleados(nombre, direccion, telefono, email, departamento, puesto, agregado, estatus, fecha_ingreso, hora_ingreso) VALUES('$nombre_usuario','$direccion','$telefono','$email','$departamento','$puesto','$login_session','1','$fecha','$hora')";
                $sql4 = "INSERT INTO usdp_usuarios(nombre, perfil, email, telefono, agregado, estatus, fecha_ingreso, hora_ingreso) VALUES('$nombre_usuario','$perfil','$email','$telefono','$login_session','1','$fecha','$hora')";    
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
                             window.location.href="./empleados.php";
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
                    <h2>Agregar nuevo empleado</h2>
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="assets/images/logoplus.png"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10"></h4>
                                    <h6 class="card-subtitle"></h6>
                                <form class="form-horizontal form-material mx-2"  method="post" action="" enctype="multipart/form-data">
                                    <div class="row text-center justify-content-md-center">
                                       <!-- <input type="file" name="archivo"> -->
                                    </div>
                                    
        
                                </center>
                            </div>
                           
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Nombre</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="nombre">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Direccion del trabajo</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line"
                                                id="example-email" name="direccion">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">
                                        Correo electronico</label>
                                        <div class="col-md-12">
                                            <input type="text" value=""
                                                class="form-control form-control-line" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Telefono</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="telefono">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Perfil</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="perfil">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Departamento</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="departamento">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Puesto de trabajo</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="puesto">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label class="col-md-12">Contraseña</label>
                                              <input type="password" name="pass" class="form-control" placeholder="" >
                                            </div>
                                            <div class="col">
                                                <label class="col-md-12">Repetir contraseña</label>
                                              <input type="password" name="rpass" class="form-control" placeholder="" >
                                            </div>
                                          </div>
                                    </div>
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