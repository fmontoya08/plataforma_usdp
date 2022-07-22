<?php 
    include('./php/session.php');
    require_once('./php/db.php');
    require_once('./php/conexion.php');
    $title = '4';
    $usuario = $_GET['usuario'];

    $query_consulta_usuario = "SELECT * FROM usdp_usuarios WHERE id_usuario = '$usuario'";
    $consulta_usuario = mysqli_query($con, $query_consulta_usuario);
    $row_usuario = mysqli_fetch_array($consulta_usuario);

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
                              <li class="breadcrumb-item active" aria-current="page">Ugalde</li>
                              <li class="breadcrumb-item active" aria-current="page">Usuario</li>
                            </ol>
                          </nav>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="assets/images/logo-user.png"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $row_usuario['nombre']; ?></h4>
                                    <h6 class="card-subtitle"><?php echo $row_usuario['perfil']; ?></h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-6"><a href="javascript:void(0)" class="link"><i
                                                    class="icon-people"></i>
                                                <font class="font-medium">Estatus:</font>
                                            </a></div>
                                        <div class="col-6"><a href="javascript:void(0)" class="link"><i
                                                    class="icon-picture"></i>
                                                <font class="font-medium"><?php if ($row_usuario['estatus']==='1') {
                                                    echo "Activo";
                                                }else{echo "Inactivo";} ?></font>
                                            </a></div>
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
                                <form class="form-horizontal form-material mx-2">
                                    <div class="form-group">
                                        <label class="col-md-12">Correo electronico</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="<?php echo $row_usuario[
                                            'email']; ?>"
                                                class="form-control form-control-line" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Telefono</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="<?php echo $row_usuario[
                                            'telefono']; ?>"
                                                class="form-control form-control-line" name="example-email"
                                                id="example-email" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">
                                        Agregado por</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $row_usuario[
                                            'agregado']; ?>"
                                                class="form-control form-control-line" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label class="col-md-12">Fecha de registro</label>
                                              <input type="text" class="form-control" placeholder="<?php echo $row_usuario['fecha_ingreso']; ?>" readonly>
                                            </div>
                                            <div class="col">
                                                <label class="col-md-12">Hora de registro</label>
                                              <input type="password" class="form-control" placeholder="<?php echo $row_usuario['hora_ingreso']; ?>" readonly>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success text-white">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

            






            <?php include('./php/footer.php'); ?>

        </div>
    </div>

    <?php include('./php/script.php'); ?>
  
</body>

</html>