<?php 
    include('./php/session.php');
    require_once('./php/db.php');
    require_once('./php/conexion.php');
    $title = '2';
    $active = '1';
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
                              <li class="breadcrumb-item active" aria-current="page">Ugalde - Tabla de usuarios</li>
                            </ol>
                          </nav>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    
                        <div class="tab-content">
                            <div class="text-end upgrade-btn">
                                <!-- <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="inactivos.php?pagina=usuarios" class="btn btn-info" style="color:#ffffff;" target="_blank">Inactivos</a>
                                </div> -->
                             <button type="button" id="modal_button" class="btn btn-info m-3" style="color: #ffffff;">Agregar usuario</button>
                            </div>
                               <div class="table-responsive">
                                    <table class="table" id="tabla_dinamica">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Cliente</th>
                                                <th scope="col" class="text-center">Titular</th>
                                                <th scope="col" class="text-center">Denominacion y/o descripcion</th>
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
                                                <td class="text-center">'.$row_marcas['no_expediente'].'</td>
                                                <td class="text-center">'.$row_marcas['no_registro'].'</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group">
                                                    <a href="vista_usuario.php?usuario='.$row_marcas['id_marcas'].' " class="btn btn-info" style="color:#ffffff;">Ver</a>
                                                        <button type="button" id ="'.$row_marcas["id_marcas"].'" class="btn btn-warning update" style="color:#ffffff;">Editar</button>
                                                        <button type="button" id="'.$row_marcas["id_marcas"].'" class="btn btn-danger delete" style="color:#ffffff;">Eliminar</button>
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
    <script>
$(document).ready(function(){
 fetchUser(); //This function will load all data on web page when page load
 function fetchUser() // This function will fetch data from table and display under <div id="result">
 {
  var action = "Load";
  $.ajax({
   url : "action_usuarios.php", //Request send to "./php/action_usuarios.php page"
   method:"POST", //Using of Post method for send data
   data:{action:action}, //action variable data has been send to server
   success:function(data){
    $('#result').html(data); //It will display data under div tag with id result
   }
  });
 }

 //This JQuery code will Reset value of Modal item when modal will load for create new records
 $('#modal_button').click(function(){
  $('#customerModal').modal('show'); //It will load modal on web page
  $('#cliente').val(''); //This will clear Modal first name textbox
  $('#titular').val('');
  $('#descripcion').val(''); //This will clear Modal first name textbox
  $('#tipo_marca').val('');
  $('#clase').val('');
  $('#clase_rela').val('');
  $('#descrip_servi').val(''); 
  $('#expediente').val('');
  $('#registro').val('');
  $('#estatus').val('');
  $('#f_presentacion').val('');
  $('#f_concesion').val('');
  $('#f_vigencia').val('');
  $('#f_p_uso').val('');
  $('#f_d_uso').val('');
  $('.modal-title').text("Ingrese la informacion de la marca"); //It will change Modal title to Create new Records
  $('#action').val('Agregar'); //This will reset Button value ot Create
 });

 //This JQuery code is for Click on Modal action button for Create new records or Update existing records. This code will use for both Create and Update of data through modal
 $('#action').click(function(){
  var cliente = $('#cliente').val(); 
  var titular = $('#titular').val();
  var descripcion = $('#descripcion').val();
  var tipo_marca = $('#tipo_marca').val();
  var clase = $('#clase').val();
    var clase_rela = $('#clase_rela').val(); 
  var descrip_servi = $('#descrip_servi').val();
  var expediente = $('#expediente').val();
  var registro = $('#registro').val();
  var estatus = $('#estatus').val();
    var f_presentacion = $('#f_presentacion').val(); 
  var f_concesion = $('#f_concesion').val();
  var f_vigencia = $('#f_vigencia').val();
  var f_p_uso = $('#f_p_uso').val();
  var f_d_uso = $('#f_d_uso').val(); 
  var id = $('#customer_id').val();  //Get the value of hidden field customer id
  var action = $('#action').val();  //Get the value of Modal Action button and stored into action variable
  if(cliente != '' && titular != '' && descripcion != '' && tipo_marca != '' && clase != '' clase_rela != '' && descrip_servi != '' && expediente != '' && registro != '' && estatus != '' f_presentacion != '' && f_concesion != '' && f_vigencia != '' && f_p_uso != '' && f_d_uso != '') //This condition will check both variable has some value
  {
   $.ajax({
    url : "action_usuarios.php",    //Request send to "./php/action_usuarios.php page"
    method:"POST",     //Using of Post method for send data
    data:{cliente:cliente, titular:titular, descripcion:descripcion, tipo_marca:tipo_marca, clase:clase, clase_rela:clase_rela, descrip_servi:descrip_servi, expediente:expediente, registro:registro, estatus:estatus, f_presentacion:f_presentacion, f_concesion:f_concesion, f_vigencia:f_vigencia, f_p_uso:f_p_uso, f_d_uso:f_d_uso, id:id, action:action}, //Send data to server
    success:function(data){
     alert(data);    //It will pop up which data it was received from server side
     $('#customerModal').modal('hide'); //It will hide Customer Modal from webpage.
     fetchUser();    // Fetch User function has been called and it will load data under divison tag with id result
    }
   });
  }
  else
  {
   alert("Both Fields are Required"); //If both or any one of the variable has no value them it will display this message
  }
 });

 //This JQuery code is for Update customer data. If we have click on any customer row update button then this code will execute
 $(document).on('click', '.update', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  var action = "Select";   //We have define action variable value is equal to select
  $.ajax({
   url:"action_usuarios.php",   //Request send to "./php/action_usuarios.php page"
   method:"POST",    //Using of Post method for send data
   data:{id:id, action:action},//Send data to server
   dataType:"json",   //Here we have define json data type, so server will send data in json format.
   success:function(data){
    $('#customerModal').modal('show');   //It will display modal on webpage
    $('.modal-title').text("Actualizar informacion"); //This code will change this class text to Update records
    $('#action').val("Update");     //This code will change Button value to Update
    $('#customer_id').val(id);     //It will define value of id variable to this customer id hidden field
    $('#nombre').val(data.nombre);  //It will assign value to modal first name texbox
    $('#perfil').val(data.perfil); 
    $('#email').val(data.email);  //It will assign value to modal first name texbox
    $('#telefono').val(data.telefono); 
    $('#estatus').val(data.estatus);  //It will assign value to modal first name texbox
    
   }
  });
 });

 //This JQuery code is for Delete customer data. If we have click on any customer row delete button then this code will execute
 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  if(confirm("Estas seguro de eliminar este registro?")) //Confim Box if OK then
  {
   var action = "Delete"; //Define action variable value Delete
   $.ajax({
    url:"action_usuarios.php",    //Request send to "./php/action_usuarios.php page"
    method:"POST",     //Using of Post method for send data
    data:{id:id, action:action}, //Data send to server from ajax method
    success:function(data)
    {
     fetchUser();    // fetchUser() function has been called and it will load data under divison tag with id result
     alert(data);    //It will pop up which data it was received from server side
    }
   })
  }
  else  //Confim Box if cancel then 
  {
   return false; //No action will perform
  }
 });
});
</script>


<div id="customerModal" class="modal fade">
 <div class="modal-dialog modal-xl">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Create New Records</h4>
   </div>
   <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>Datos de la marca</h3>
                        <input type="text" name="cliente" id="cliente" placeholder="Cliente" class="form-control" style="width: 46%;">
                        <br>
                        <input type="text" name="titular" id="titular" placeholder="Titular" class="form-control" style="width: 46%;">
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mt-3">Datos generales</h3>
                        <input type="text" name="descripcion" id="descripcion" placeholder="Denominacion y/o descripcion" class="form-control" >
                        <br>
                        <input type="text" name="tipo_marca" id="tipo_marca" placeholder="Tipo de marca" class="form-control" >
                        <br>
                        <input type="text" name="clase" id="clase" placeholder="Clase" class="form-control" >
                        <br>
                        <input type="text" name="clase_rela" id="clase_rela" placeholder="Clases relacionadas" class="form-control" >
                        <br>
                        <input type="text" name="descrip_servi" id="descrip_servi" placeholder="Descripcion de producto y/o servicios" class="form-control" >
                        <br>
                        <input type="text" name="expediente" id="expediente" placeholder="Numero de expediente" class="form-control" >
                        <br>
                        <input type="text" name="registro" id="registro" placeholder="Numero de registro" class="form-control" >
                        <br>
                        <input type="text" name="estatus" id="estatus" placeholder="Estatus" class="form-control" >
                        <br>
                        <!-- <input type="file" name="" id="" class="form-control" > -->
                        <!-- <br> -->
                        <!-- <input type="text" name="" id="" placeholder="Poliza" class="form-control" > -->
                    </div>
                    <div class="col-md-6">
                        <h3 class="mt-3" style="color: #ffffff;">lorem</h3>
                        <input class="form-control"  type="text" name="f_presentacion" id="f_presentacion" placeholder="Fecha de presentacion" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')">
                        <br>
                        <input class="form-control"  type="text" name="f_concesion" id="f_concesion" placeholder="Fecha de concesion" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')">
                        <br>
                        <input class="form-control"  type="text" name="f_vigencia" id="f_vigencia" placeholder="Fecha de vigencia" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')">
                        <br>
                        <input class="form-control"  type="text" name="f_p_uso" id="f_p_uso" placeholder="Fecha de primer uso" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')">
                        <br>
                        <input class="form-control"  type="text" name="f_d_uso" id="f_d_uso" placeholder="Fecha de declaracion de uso" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')">
                    </div>
                </div>
            </div>
   </div>
   <div class="modal-footer">
    <input type="hidden" name="customer_id" id="customer_id" />
    <input type="submit" name="action" id="action" class="btn btn-info" style="color: #ffffff;" />
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: #ffffff;">Cerrar</button>
   </div>
  </div>
 </div>
</div>

<?php include('./php/modal.php'); ?>

</body>

</html>