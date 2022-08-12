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
                              <li class="breadcrumb-item active" aria-current="page">Ugalde</li>
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
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#usuarios">Ususarios</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#clientes">Clientes</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#marcas">Marcas</a>
                          </li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane container active" id="usuarios">
                            <div class="text-end upgrade-btn">
                                <!-- <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="inactivos.php?pagina=usuarios" class="btn btn-info" style="color:#ffffff;" target="_blank">Inactivos</a>
                                </div> -->
                             <button type="button" data-bs-toggle="modal" data-bs-target="#customerModal"class="btn btn-info m-3" style="color: #ffffff;">Agregar usuario</button>
                            </div>
                               <div class="table-responsive">
                                    <table class="table" id="tabla_dinamica">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Nombre</th>
                                                <th scope="col" class="text-center">Perfil</th>
                                                <th scope="col" class="text-center">Email</th>
                                                <th scope="col" class="text-center">Telefono</th>
                                                <th scope="col" class="text-center">Estatus</th>
                                                <th scope="col" class="text-center">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $query_usuarios = "SELECT * FROM usdp_usuarios";
                                                $consulta_usuarios = mysqli_query($con, $query_usuarios);
                                                while($row_usuarios = mysqli_fetch_array($consulta_usuarios)){
                                                echo '
                                                    <tr>
                                                <td class="text-center">'.$row_usuarios['nombre'].'</td>
                                                <td class="text-center">'.$row_usuarios['perfil'].'</td>
                                                <td class="text-center">'.$row_usuarios['email'].'</td>
                                                <td class="text-center">'.$row_usuarios['telefono'].'</td>
                                                <td class="text-center">'.(($row_usuarios['estatus']==='1'?'Activo':'Inactivo')).'</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                    <a href="vista_usuario.php?usuario='.$row_usuarios['id_usuario'].' " class="btn btn-info" style="color:#ffffff;">Ver</a>
                                                        <a href="./php/editar_usuario.php?id='.$row_usuarios['id_usuario'].' " class="btn btn-warning" style="color:#ffffff;">Editar</a>
                                                        <a href="./php/eliminar_usuario.php?id='.$row_usuarios['id_usuario'].' " class="btn btn-danger" style="color:#ffffff;">Eliminar</a>
                                                    </div>
                                                </td>
                                            </tr>
                                                ';}
                                             ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                          </div>
                          <div class="tab-pane container fade" id="clientes">
                              <div class="text-end upgrade-btn">
                                <!-- <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="inactivos.php?pagina=usuarios" class="btn btn-info" style="color:#ffffff;" target="_blank">Inactivos</a>
                                </div> -->
                             <button type="button" data-bs-toggle="modal" data-bs-target="#customerModal2" class="btn btn-info m-3" style="color: #ffffff;">Agregar cliente</button>
                            </div>
                               <div class="table-responsive">
                                    <table class="table" id="tabla_dinamica2">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Nombre</th>
                                                <th scope="col" class="text-center">Direccion</th>
                                                <th scope="col" class="text-center">Telefono</th>
                                                <th scope="col" class="text-center">Web</th>
                                                <th scope="col" class="text-center">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $query_clientes = "SELECT * FROM usdp_clientes";
                                                $consulta_clientes = mysqli_query($con, $query_clientes);
                                                while($row_clientes = mysqli_fetch_array($consulta_clientes)){
                                                echo '
                                                    <tr>
                                                <td class="text-center">'.$row_clientes['nombre'].'</td>
                                                <td class="text-center">'.$row_clientes['direccion'].'</td>
                                                <td class="text-center">'.$row_clientes['telefono'].'</td>
                                                <td class="text-center">'.$row_clientes['web'].'</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <a href="vista_cliente.php?cliente='.$row_clientes['id_cliente'].' " class="btn btn-info" style="color:#ffffff;">Ver</a>
                                                        <button type="button" id ="'.$row_clientes["id_cliente"].'" class="btn btn-warning update_cliente" style="color:#ffffff;">Editar</button>
                                                        <button type="button" id="'.$row_clientes["id_cliente"].'" class="btn btn-danger delete_cliente" style="color:#ffffff;">Eliminar</button>
                                                    </div>
                                                </td>
                                            </tr>
                                                ';}
                                             ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                          </div>
                          <div class="tab-pane container fade" id="marcas">
                              <div class="text-end upgrade-btn">
                                <!-- <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="inactivos.php?pagina=usuarios" class="btn btn-info" style="color:#ffffff;" target="_blank">Inactivos</a>
                                </div> -->
                             <button type="button" data-bs-toggle="modal" data-bs-target="#customerModal3" class="btn btn-info m-3" style="color: #ffffff;">Agregar marca</button>
                            </div>
                               <div class="table-responsive">
                                    <table class="table" id="tabla_dinamica3">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Cliente</th>
                                                <th scope="col" class="text-center">Titular</th>
                                                <th scope="col" class="text-center">Descripcion</th>
                                                <th scope="col" class="text-center">Tipo de marca</th>
                                                <th scope="col" class="text-center">Numero de expediente</th>
                                                <th scope="col" class="text-center">Numero de registro</th>
                                                <th scope="col" class="text-center">Estatus</th>
                                                <th scope="col" class="text-center">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $query_marcas = "SELECT * FROM usdp_marcas";
                                                $consulta_marcas = mysqli_query($con, $query_marcas);
                                                while($row_marcas = mysqli_fetch_array($consulta_marcas)){
                                                echo '
                                                    <tr>
                                                <td class="text-center">'.$row_marcas['cliente'].'</td>
                                                <td class="text-center">'.$row_marcas['titular'].'</td>
                                                <td class="text-center">'.$row_marcas['descripcion'].'</td>
                                                <td class="text-center">'.$row_marcas['tipo_marca'].'</td>
                                                <td class="text-center">'.$row_marcas['n_expediente'].'</td>
                                                <td class="text-center">'.$row_marcas['n_registro'].'</td>
                                                <td class="text-center">'.$row_marcas['estatus'].'</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                        <a href="vista_cliente.php?cliente='.$row_marcas['id_marca'].' " class="btn btn-info" style="color:#ffffff;">Ver</a>
                                                        <button type="button" id ="'.$row_marcas["id_marca"].'" class="btn btn-warning update_cliente" style="color:#ffffff;">Editar</button>
                                                        <button type="button" id="'.$row_clientes["id_cliente"].'" class="btn btn-danger delete" style="color:#ffffff;">Eliminar</button>
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

<div id="customerModal2" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Agregar informacion del cliente</h4>
   </div>
   <div class="modal-body">
    <form action="./php/ingresar_cliente.php" method="POST">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" />
    <br />
    <label>Direccion</label>
    <input type="text" name="direccion" id="perfil" class="form-control" />
    <br />
    <label>Telefono</label>
    <input type="text" name="telefono" id="email" class="form-control" />
    <br />
    <label>Sitio Web</label>
    <input type="text" name="web" id="telefono" class="form-control" />
    
   </div>
   <div class="modal-footer">
    <input type="submit"  class="btn btn-info" style="color: #ffffff;" />
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: #ffffff;">Cerrar</button>
    </form>
   </div>
  </div>
 </div>
</div>


<div id="customerModal3" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Agregar informacion del la marca</h4>
   </div>
   <div class="modal-body">
    <form action="./php/ingresar_marca.php" method="POST">
    <label>Cliente</label>
    <input type="text" name="cliente" id="nombre" class="form-control" />
    <br />
    <label>Titular</label>
    <input type="text" name="titular" id="perfil" class="form-control" />
    <br />
    <label>Descripcion</label>
    <input type="text" name="descripcion" id="email" class="form-control" />
    <br />
    <label>Tipo de marca</label>
    <input type="text" name="marca" id="telefono" class="form-control" />
    <br />
    <label>Numero de expediente</label>
    <input type="text" name="expediente" id="email" class="form-control" />
    <br />
    <label>Numero de registro</label>
    <input type="text" name="registro" id="telefono" class="form-control" />

    
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