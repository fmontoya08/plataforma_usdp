<?php 
    include('./php/session.php');
    require_once('./php/db.php');
    require_once('./php/conexion.php');
    $title = '2';

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
                              <li class="breadcrumb-item active" aria-current="page">Empleados</li>
                            </ol>
                          </nav>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-end upgrade-btn">
                                <!-- <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="inactivos.php?pagina=usuarios" class="btn btn-info" style="color:#ffffff;" target="_blank">Inactivos</a>
                                </div> -->
                             <button type="button" class="btn btn-info m-3" onclick="location.href='agregar_empleado.php'" style="color: #ffffff;">Agregar empleado</button>
                            </div>
                               <div class="table-responsive">
                                    <table class="table" id="tabla_dinamica">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Nombre</th>
                                                <th scope="col" class="text-center">Telefono</th>
                                                <th scope="col" class="text-center">Correo</th>
                                                <th scope="col" class="text-center">Departamento</th>
                                                <th scope="col" class="text-center">Puesto de trabajo</th>
                                                <th scope="col" class="text-center">Responsable</th>
                                                <th scope="col" class="text-center">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $query_usuarios = "SELECT * FROM usdp_empleados";
                                                $consulta_usuarios = mysqli_query($con, $query_usuarios);
                                                while($row_usuarios = mysqli_fetch_array($consulta_usuarios)){
                                                echo '
                                                    <tr>
                                                <td class="text-center">'.$row_usuarios['nombre'].'</td>
                                                <td class="text-center">'.$row_usuarios['telefono'].'</td>
                                                <td class="text-center">'.$row_usuarios['email'].'</td>
                                                <td class="text-center">'.$row_usuarios['departamento'].'</td>
                                                <td class="text-center">'.$row_usuarios['puesto'].'</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                    <a href="vista_usuario.php?usuario='.$row_usuarios['id_empleado'].' " class="btn btn-info" style="color:#ffffff;">Ver</a>
                                                        <a href="./php/editar_usuario.php?id='.$row_usuarios['id_empleado'].' " class="btn btn-warning" style="color:#ffffff;">Editar</a>
                                                        <a href="./php/eliminar_usuario.php?id='.$row_usuarios['id_empleado'].' " class="btn btn-danger" style="color:#ffffff;">Eliminar</a>
                                                    </div>
                                                </td>
                                            </tr>
                                                ';}
                                             ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                    </div>
                </div>
            </div>

            






            <?php include('./php/footer.php'); ?>

        </div>
    </div>

    <?php include('./php/script.php'); ?>
  
</body>

</html>