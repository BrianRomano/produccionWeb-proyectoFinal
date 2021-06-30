<!-- HEADER -->
<?php include_once('./layouts/header.php') ?>

<!-- Eliminar Producto -->
  <?php 

    include_once('./../logic/ProductoBusiness.php');
    include('./../logic/CategoryBusiness.php');
    include('./../logic/ModelsBusiness.php');

    $ProdB = new ProductoBusiness($con);
    $CatB = new CategoryBusiness($con);
    $ModB = new ModelsBusiness($con);

    // ELIMINAR MODELO
    if(isset($_GET['del'])){
      $ProdB->deleteProducto($_GET['del']);
      redirect('productos.php');
    }

    if($permiso == 'adm' || $permiso == 'prod'):
  ?>

  <body class="dark-edition">

    <!-- ASIDE  -->
      <?php include_once('./layouts/aside.php') ?>

      <!-- Menu Principal -->
      <div class="main-panel">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-plain">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0">Productos</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead class="">
                          <th>
                            ID
                          </th>
                          <th>
                            Titulo
                          </th>
                          <th>
                            Descripción
                          </th>
                          <th>
                            Precio
                          </th>
                          <th>
                            Activo
                          </th>
                          <th>
                            Destacado
                          </th>
                          <th>
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Marca
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="productos.php">Borrar filtro</a>
                                <?php 
                                  foreach($CatB->getCategories() as $cat):
                                ?>
                                  <a class="dropdown-item" href="productos.php?cat=<?php echo $cat->getId()?>&mod=<?php echo isset($_GET['mod']) ? $_GET['mod'] : ''?>"><?php echo $cat->getNombre()?></a>
                                <?php
                                  endforeach;
                                ?>
                              </div>
                            </div>
                          </th>
                          <th>
                          <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Modelo
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="productos.php">Borrar filtro</a>
                                <?php 
                                  foreach($ModB->getModels() as $mod):
                                ?>
                                   <a class="dropdown-item" href="productos.php?mod=<?php echo $mod->getId()?>&cat=<?php echo isset($_GET['cat']) ? $_GET['cat'] : ''?>"><?php echo $mod->getNombre()?></a>
                                <?php
                                  endforeach;
                                ?>
                              </div>
                            </div>
                          </th>
                          <th> 
                            Acción
                          </th>
                        </thead>
                        <tbody>
                        <?php 
                          foreach($ProdB->getProductos($_GET) as $prod):
                        ?>
                          <tr>
                            <td>
                              <?php echo $prod->getId()?>
                            </td>
                            <td>
                              <?php echo $prod->getTitulo()?>
                            </td>
                            <td>
                              <?php echo $prod->getDescripcion()?>
                            </td>
                            <td>
                              <?php echo $prod->getPrecio()?>
                            </td>
                            <td>
                            <?php 
                                if($prod->getActivo() == 1){
                                  echo 'Si';
                                } else {
                                  echo 'No';
                                }
                              ?>
                            </td>
                            <td>
                            <?php 
                                if($prod->getDestacado() == 1){ 
                                  echo 'Si';
                                } else {
                                  echo 'No';
                                }
                              ?>
                            </td>
                            <td>
                              <?php echo $prod->getCategoria()->getNombre();?>
                            </td>
                            <td>
                              <?php echo $prod->getModelo()->getNombre();?>
                            </td>
                            <td>
                              <a href="agregar-productos.php?edit=<?php echo $prod->getId()?>"><img class="icons" src="./assets/icon/lapiz.png" alt="Editar"></a>
                              <a href="productos.php?del=<?php echo $prod->getId()?>"><img class="icons" src="./assets/icon/eliminar.png" alt="Eliminar"></a>
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
                <a href="agregar-productos.php"><button type="button" class="btn btn-primary col-md-2" style="margin-top:-60px; float:right">Agregar</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="./assets/bootstrap/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/bootstrap/popper/popper.min.js"></script>
    <script src="./assets/bootstrap/bootstrap/js/bootstrap.min.js"></script>
  </body>
  <?php endif; ?>
</html>