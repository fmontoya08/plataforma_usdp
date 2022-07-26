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
                             <button type="button" id="modal_button" class="btn btn-info m-3" style="color: #ffffff;">Agregar usuario</button>
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
                                                        <button type="button" id ="'.$row_usuarios["id_usuario"].'" class="btn btn-warning update" style="color:#ffffff;">Editar</button>
                                                        <button type="button" id="'.$row_usuarios["id_usuario"].'" class="btn btn-danger delete" style="color:#ffffff;">Eliminar</button>
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
                             <button type="button" id="modal_button_cliente" class="btn btn-info m-3" style="color: #ffffff;">Agregar cliente</button>
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
                                                <td class="text-center">'.$row_clientes['sitio_web'].'</td>
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
                          <div class="tab-pane container fade" id="marcas">Marcas</div>
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
  $('#nombre').val(''); //This will clear Modal first name textbox
  $('#perfil').val('');
  $('#email').val(''); //This will clear Modal first name textbox
  $('#telefono').val('');
  $('#estatus').val('1'); //This will clear Modal last name textbox
  $('.modal-title').text("Ingrese la informacion de usuario"); //It will change Modal title to Create new Records
  $('#action').val('Agregar'); //This will reset Button value ot Create
 });

 //This JQuery code is for Click on Modal action button for Create new records or Update existing records. This code will use for both Create and Update of data through modal
 $('#action').click(function(){
  var nombre = $('#nombre').val(); //Get the value of first name textbox.
  var perfil = $('#perfil').val();
  var email = $('#email').val();
  var telefono = $('#telefono').val();
  var estatus = $('#estatus').val(); //Get the value of last name textbox
  var id = $('#customer_id').val();  //Get the value of hidden field customer id
  var action = $('#action').val();  //Get the value of Modal Action button and stored into action variable
  if(nombre != '' && perfil != '' && email != '' && telefono != '' && estatus != '') //This condition will check both variable has some value
  {
   $.ajax({
    url : "action_usuarios.php",    //Request send to "./php/action_usuarios.php page"
    method:"POST",     //Using of Post method for send data
    data:{nombre:nombre, perfil:perfil, email:email, telefono:telefono, estatus:estatus, id:id, action:action}, //Send data to server
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

<!-- ----------------------------------------------------------------------------------------------------------------------------------- -->
<script>
$(document).ready(function(){
 fetchUser(); //This function will load all data on web page when page load
 function fetchUser() // This function will fetch data from table and display under <div id="result">
 {
  var action_cliente = "Load";
  $.ajax({
   url : "action_clientes.php", //Request send to "./php/action_usuarios.php page"
   method:"POST", //Using of Post method for send data
   data:{action_cliente:action_cliente}, //action variable data has been send to server
   success:function(data){
    $('#result').html(data); //It will display data under div tag with id result
   }
  });
 }

 //This JQuery code will Reset value of Modal item when modal will load for create new records
 $('#modal_button_cliente').click(function(){
  $('#customerModalCliente').modal('show'); //It will load modal on web page
  $('#nombre_cliente').val(''); //This will clear Modal first name textbox
  $('#compania').val('');
  $('#numero_cliente').val(''); //This will clear Modal first name textbox
  $('#direccion').val('');
  $('#direccion_2').val('');
  $('#ciudad').val('');
  $('#provincia').val('');
  $('#cp').val('');
  $('#pais').val(''); //This will clear Modal first name textbox
  $('#rfc').val('');
  $('#puesto_trabajo').val(''); //This will clear Modal first name textbox
  $('#telefono_cliente').val('');
  $('#celular').val('');
  $('#email_cliente').val('');
  $('#web').val('');
  $('#titulo').val('');
  $('.modal-title').text("Ingrese la informacion del cliente"); //It will change Modal title to Create new Records
  $('#action_cliente').val('Agregar'); //This will reset Button value ot Create
 });

 //This JQuery code is for Click on Modal action button for Create new records or Update existing records. This code will use for both Create and Update of data through modal
 $('#action_cliente').click(function(){
  var nombre_cliente = $('#nombre_cliente').val(); //Get the value of first name textbox.
  var compania = $('#compania').val();
  var numero_cliente = $('#numero_cliente').val();
  var direccion = $('#direccion').val();
  var direccion_2 = $('#direccion_2').val(); //Get the value of last name textbox
  var ciudad = $('#ciudad').val(); //Get the value of first name textbox.
  var provincia = $('#provincia').val();
  var cp = $('#cp').val();
  var pais = $('#pais').val();
  var rfc = $('#rfc').val(); //Get the value of last name textbox
  var puesto_trabajo = $('#puesto_trabajo').val(); //Get the value of first name textbox.
  var telefono_cliente = $('#telefono_cliente').val();
  var celular = $('#celular').val();
  var email_cliente = $('#email_cliente').val();
  var web = $('#web').val(); //Get the value of last name textbox
  var titulo = $('#titulo').val();
  var id_cliente = $('#customer_id_cliente').val();  //Get the value of hidden field customer id
  var action_cliente = $('#action_cliente').val();  //Get the value of Modal Action button and stored into action variable
  if(nombre != '' && compania != '' && numero_cliente != '' && direccion != '' && direccion_2 != '' && ciudad != '' && provincia != '' && cp != '' && pais != '' && rfc != '' && puesto_trabajo != '' && telefono != '' && celular != '' && email != '' && web != '' && titulo != '')
  {
   $.ajax({
    url : "action_clientes.php",    //Request send to "./php/action_usuarios.php page"
    method:"POST",     //Using of Post method for send data
    data:{nombre_cliente:nombre_cliente, compania:compania, numero_cliente:numero_cliente, direccion:direccion, direccion_2:direccion_2, ciudad:ciudad, provincia:provincia, cp:cp, pais:pais, rfc:rfc, puesto_trabajo:puesto_trabajo, telefono_cliente:telefono_cliente, celular:celular, email_cliente:email_cliente, web:web, titulo:titulo, id_cliente:id_cliente, action_cliente:action_cliente}, //Send data to server
    success:function(data){
     alert(data);    //It will pop up which data it was received from server side
     $('#customerModalCliente').modal('hide'); //It will hide Customer Modal from webpage.
     fetchUser();    // Fetch User function has been called and it will load data under divison tag with id result
    }
   });
  }
  else
  {
   alert("Todos los campos son obligatorios"); //If both or any one of the variable has no value them it will display this message
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
 $(document).on('click', '.delete_cliente', function(){
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
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Create New Records</h4>
   </div>
   <div class="modal-body">
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
    <input type="text" name="estatus" id="estatus" class="form-control" readonly />
   </div>
   <div class="modal-footer">
    <input type="hidden" name="customer_id" id="customer_id" />
    <input type="submit" name="action" id="action" class="btn btn-info" style="color: #ffffff;" />
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: #ffffff;">Cerrar</button>
   </div>
  </div>
 </div>
</div>



<div id="customerModalCliente" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Create New Records</h4>
   </div>
   <div class="modal-body">
  
        <label>Nombre</label>
      <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente">

        <label>Compañia</label>
      <input type="text" class="form-control" name="compania" id="compania">
    
  
        <label>Numero del cliente</label>
      <input type="text" class="form-control" name="numero_cliente" id="numero_cliente">

        <label>Direccion</label>
      <input type="text" class="form-control" name="direccion" id="direccion">
    
  
        <label>Direccion 2</label>
      <input type="text" class="form-control" name="direccion_2" id="direccion_2">

        <label>Ciudad</label>
      <input type="text" class="form-control" name="ciudad" id="ciudad">
    
  
        <label>Provincia</label>
      <input type="text" class="form-control" name="provincia" id="provincia">

        <label>Codigo postal</label>
      <input type="text" class="form-control" name="cp" id="cp">
    
  
        <label>Pais</label>
      <input type="text" class="form-control" name="pais" id="pais">

        <label>RFC</label>
      <input type="text" class="form-control" name="rfc" id="rfc">
    
  
        <label>Puesto de trabajo</label>
      <input type="text" class="form-control" name="puesto_trabajo" id="puesto_trabajo">

        <label>Telefono</label>
      <input type="text" class="form-control" name="telefono_cliente" id="telefono_cliente">
    
  
        <label>Celular</label>
      <input type="text" class="form-control" name="celular" id="celular">

        <label>Correo electronico</label>
      <input type="text" class="form-control" name="email_cliente" id="email_cliente">
    
  
        <label>Sitio web</label>
      <input type="text" class="form-control" name="web" id="web">

        <label>Titulo</label>
      <input type="text" class="form-control" name="titulo" id="titulo">
    
   </div>
   <div class="modal-footer">
    <input type="hidden" name="customer_id_cliente" id="customer_id_cliente" />
    <input type="submit" name="action_cliente" id="action_cliente" class="btn btn-info" style="color: #ffffff;" />
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: #ffffff;">Cerrar</button>
   </div>
  </div>
 </div>
</div>
</body>

</html>