<!-- HEADER  -->
  <?php include_once('./layouts/header.php') ?>

  <?php 
  
    include_once('./../logic/UserBusiness.php');
    
    $bUser = new UserBusiness($con);

    if(isset($_GET['del'])){
      $bUser->deleteUser($_GET['del']);
      redirect('usuarios.php');
    }

  ?>

  <body class="dark-edition">

    <!-- ASIDE  -->
      <?php include_once('./layouts/aside.php') ?>

      <!-- MENU -->
      <div class="main-panel">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-plain">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0">Usuarios</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead class="">
                          <th> 
                            ID
                          </th>
                          <th>
                            Nombre
                          </th>
                          <th>
                            Usuario
                          </th>
                          <th>
                            Perfil
                          </th>
                          <th>
                            Acciones
                          </th>
                        </thead>
                        <tbody>
                        <?php foreach($bUser->getUsers() as $user){ ?>
                            <tr>
                              <td>
                                <?php echo $user->getId()?>
                              </td>
                              <td>
                                <?php echo $user->getNombre()?>
                              </td>
                              <td>
                                <?php echo $user->getUser()?>
                              </td>
                              <td>
                                <?php echo implode(', ',array_map(function ($p){return $p->getNombre();},$user->getPerfiles()) )  ?>
                              </td>
                              <td>
                                <a href="register.php?edit=<?php echo $user->getId() ?>"><img class="icons" src="./assets/icon/lapiz.png" alt="Editar"></a>
                                <a href="usuarios.php?del=<?php echo $user->getId() ?>"><img class="icons" src="./assets/icon/eliminar.png" alt="Eliminar"></a>
                              </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <a href="register.php"><button type="button" class="btn btn-primary col-md-2" style="margin-top:-60px; float:right">Registrar</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>