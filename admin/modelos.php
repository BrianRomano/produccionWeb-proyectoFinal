<!-- HEADER  -->
  <?php include_once('./layouts/header.php') ?>

<!-- ELIMINAR MODELO -->
  <?php 

    include_once('./../logic/ModelsBusiness.php');
    $ModB = new ModelsBusiness($con);

    // ELIMINAR CATEGORIA
    if(isset($_GET['del'])){
      $ModB->deleteModel($_GET['del']);
      redirect('modelos.php');
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
                    <h4 class="card-title mt-0">Modelos</h4>
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
                            Activo
                          </th>
                          <th>
                            Acciones
                          </th>
                        </thead>
                        <tbody>
                        <?php 
                          foreach($ModB->getModels() as $mod):
                        ?>
                          <tr>
                            <td>
                              <?php echo $mod->getId()?>
                            </td>
                            <td>
                              <?php echo $mod->getNombre()?>
                            </td>
                            <td>
                            <?php 
                              if($mod->getActivo() == 1){
                                echo 'Si';
                              } else {
                                echo 'No';
                              }
                            ?>
                            </td>
                            <td>
                              <a href="agregar-modelo.php?edit=<?php echo $mod->getId()?>"><img class="icons" src="./assets/icon/lapiz.png" alt="Editar"></a>
                              <a href="modelos.php?del=<?php echo $mod->getId()?>"><img class="icons" src="./assets/icon/eliminar.png" alt="Eliminar"></a>
                              <a href="modelos.php?act=<?php echo $mod->getId()?>"><img class="icons" src="./assets/icon/activar.png" alt="Activar"></a>
                              <a href="modelos.php?des=<?php echo $mod->getId()?>"><img class="icons" src="./assets/icon/desactivar.png" alt="Desactivar"></a>
                            </td>
                          </tr>
                        <?php 
                          endforeach;
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <a href="agregar-modelo.php"><button type="button" class="btn btn-primary col-md-2" style="margin-top:-60px; float:right">Agregar</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>