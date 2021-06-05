<?php

include('inc/header.php');
include('inc/sidebar.php');

include_once(DIR_BASE.'LogicaNegocio/UserBusiness.php');
include_once(DIR_BASE.'LogicaNegocio/PerfilBusiness.php');
$bUser = new UserBusiness($con);
$bPerfil = new PerfilBusiness($con);


if(isset($_POST['userSubmit'])){
  unset($_POST['userSubmit']);
  
  if(!empty($_GET['edit'])){
    $bUser->modifyUser($_GET['edit'],$_POST);
  }else{
    $bUser->saveUser($_POST);
  }

  redirect('UsuariosListado.php');
}

$id = 0;
if(!empty($_GET['edit'])){
  $id = $_GET['edit'];
}

$user = $bUser->getUser($id);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Agregar/Editar Usuarios</h3>

          
        </div>
        <div class="card-body">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">  
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $user->getNombre() ?>" id="exampleInputEmail1" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email </label>
                    <input type="email" class="form-control" name="email" value="<?php echo $user->getEmail() ?>" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">User</label>
                    <input type="text" class="form-control" name="user" value="<?php echo $user->getUSer() ?>" id="exampleInputEmail1" placeholder="User">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Perfiles</label>
                    <select name="perfiles[]" multiple=multiple class="custom-select form-control-border" id="exampleSelectBorder">
                    <?php foreach($bPerfil->getPerfiles() as $perfil){ ?>
                       <option value="<?php echo $perfil->getId()?>"><?php echo $perfil->getNombre()?></option>
                    <?php }?>
                     
                  </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="userSubmit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
        </div> 
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php

include('inc/footer.php'); 

?>
