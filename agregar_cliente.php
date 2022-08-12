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
            $numero = $_POST['numero'];
            $direccion = $_POST['direccion'];
            $rfc = $_POST['rfc'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $web = $_POST['web'];
            $titulo = $_POST['titulo'];

                $db=new Conect_MySql();
                $sql = "INSERT INTO usdp_clientes(nombre, no_cliente, direccion, rfc, telefono, email, web, titulo, agregado, estatus, fecha_ingreso, hora_ingreso) VALUES ('$nombre_usuario','$numero','$direccion','$rfc','$telefono','$email','$web','$titulo','$login_session','1','$fecha','$hora')";
                 
                $query = $db->execute($sql);
                
                if($query){
                                echo'
                                    <script type="text/javascript">
                                alert("Se a agregado el cliente con exito");
                             window.location.href="./cliente.php";
                              </script>';
                    
                } 
                else {
                echo "Error";
            }
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
                              <li class="breadcrumb-item active" aria-current="page">Agregar nuevo cliente</li>
                              
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
                                        <label for="example-email" class="col-md-12">Numero del cliente</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line"
                                                id="example-email" name="numero">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Direccion</label>
                                        <div class="col-md-12">
                                            <input type="text" value=""
                                                class="form-control form-control-line" name="direccion">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">RFC</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="rfc">
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
                                        <label class="col-md-12">Correo electronico</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Sitio web</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="web">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Titulo</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder=""
                                                class="form-control form-control-line" name="titulo">
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