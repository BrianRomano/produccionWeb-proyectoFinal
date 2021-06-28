<!-- HEADER -->
  <?php include_once('./layouts/header.php') ?>

  <?php  
    
    include_once('./../logic/CategoryBusiness.php');

    $Catb = new CategoryBusiness($con);

    // ELIMINAR CATEGORIA
    if(isset($_GET['del'])){
      $Catb->deleteCategory($_GET['del']);
      redirect('categorias.php');
    }
    
    if($permiso == 'adm' || $permiso == 'cat'):
  ?>

  <body class="dark-edition">

    <!-- ASIDE  --> 
      <?php include_once('./layouts/aside.php')?> 

      <!-- MARCAS -->
      <div class="main-panel">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-plain">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0">Marcas</h4>
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
                            Acción
                          </th>
                        </thead>
                        <tbody>
                          <?php 
                            foreach($Catb->getCategories() as $cat):
                          ?>
                          <tr>
                            <td>
                              <?php echo $cat->getId()?>
                            </td>
                            <td>
                              <?php echo $cat->getNombre()?>   
                            </td>
                            <td>
                              <?php 
                                  if($cat->getActivo() == 1){
                                    echo 'Si';
                                  } else {
                                    echo 'No'; 
                                  }
                              ?>
                            </td>
                            <td>
                              <a href="agregar-categoria.php?edit=<?php echo $cat->getId()?>"><img class="icons" src="./assets/icon/lapiz.png" alt="Editar"></a>
                              <a href="categorias.php?del=<?php echo $cat->getId()?>"><img class="icons" src="./assets/icon/eliminar.png" alt="Eliminar"></a>
                            </td>
                          </tr>
                          <?php
                            endforeach;
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div><br>
                <a href="agregar-categoria.php"><button type="button" class="btn btn-primary col-md-2" style="margin-top:-60px; float:right">Agregar</button></a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <?php 
    endif;
  ?>
</html>