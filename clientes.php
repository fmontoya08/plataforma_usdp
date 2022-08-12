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
                              <li class="breadcrumb-item active" aria-current="page">Clientes</li>
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
                        
                        <div class="tab-content">
                          
                            <div class="text-end upgrade-btn">
                                <!-- <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="inactivos.php?pagina=usuarios" class="btn btn-info" style="color:#ffffff;" target="_blank">Inactivos</a>
                                </div> -->
                             <button type="button" onclick="location.href='agregar_cliente.php'" class="btn btn-info m-3" style="color: #ffffff;">Agregar cliente</button>
                            </div>
                               <div class="table-responsive">
                                    <table class="table" id="tabla_dinamica">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Nombre</th>
                                                <th scope="col" class="text-center">Direccion</th>
                                                <th scope="col" class="text-center">Telefono</th>
                                                <th scope="col" class="text-center">Sitio web</th>
                                                <th scope="col" class="text-center">Estatus</th>
                                                <th scope="col" class="text-center">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $query_usuarios = "SELECT * FROM usdp_clientes";
                                                $consulta_usuarios = mysqli_query($con, $query_usuarios);
                                                while($row_usuarios = mysqli_fetch_array($consulta_usuarios)){
                                                echo '
                                                    <tr>
                                                <td class="text-center">'.$row_usuarios['nombre'].'</td>
                                                <td class="text-center">'.$row_usuarios['direccion'].'</td>
                                                <td class="text-center">'.$row_usuarios['telefono'].'</td>
                                                <td class="text-center">'.$row_usuarios['web'].'</td>
                                                <td class="text-center">'.(($row_usuarios['estatus']==='1'?'Activo':'Inactivo')).'</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                    <a href="vista_cliente.php?cliente='.$row_usuarios['id_cliente'].' " class="btn btn-info" style="color:#ffffff;">Ver</a>
                                                        <a href="editar_usuario.php?nombre='.$row_usuarios['nombre'].' " class="btn btn-warning" style="color:#ffffff;">Editar</a>
                                                        <a href="eliminar_usuario.php?nombre='.$row_usuarios['nombre'].' " class="btn btn-danger" style="color:#ffffff;">Eliminar</a>
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
            </div>

            






            <?php include('./php/footer.php'); ?>

        </div>
    </div>

    <?php include('./php/script.php'); ?>
   

<div id="customerModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Agregar informacion del usuario</h4>
   </div>
   <div class="modal-body">
    <form action="./php/ingresar_usuario.php" method="POST">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" />
    <br />
    <label>Perfil</label>
    <input type="text" name="perfil" id="perfil" class="form-control" />
    <br />
    <label>Correo electronico</label>
    <input type="text" name="email" id="email" class="form-control" />
    <br />
    <label>Telefono</label>
    <input type="text" name="telefono" id="telefono" class="form-control" />
    <br />
    <label>Estatus</label>
    <input type="text" name="estatus" id="estatus" class="form-control" value="1" readonly />
   </div>
   <div class="modal-footer">
    <input type="submit"  class="btn btn-info" style="color: #ffffff;" />
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: #ffffff;">Cerrar</button>
    </form>
   </div>
  </div>
 </div>
</div>


</body>

</html>