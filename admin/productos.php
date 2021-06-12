<!-- HEADER -->
<?php include_once('./layouts/header.php') ?>

<!-- Eliminar Producto -->
  <?php 

    include_once('./../logic/ProductoBusiness.php');
    $ProdB = new ProductoBusiness($con);

    /*
    if(isset($_GET['del'])){
      $datos = file_get_contents('./../../../datos/producto.json');
      $datosJson = json_decode($datos,true);
      unset($datosJson[$_GET['del']]);
      $fp = fopen('./../../../datos/producto.json','w');
      $datosString = json_encode($datosJson);
      fwrite($fp,$datosString);
      fclose($fp);
      redirect('index.php');
    }
    */
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
                            IDCategoria
                          </th>
                          <th>
                            IDMarca
                          </th>
                          <th>
                            Acciones
                          </th>
                        </thead>
                        <tbody>
                        <?php 
                          foreach($ProdB->getProductos() as $prod):
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
                              <?php echo implode(', ',array_map(function ($c){return $c->getNombre();},$prod->getCategoria()))?>
                            </td>
                            <td>
                              <?php ?>
                            </td>
                            <td>
                              <a href="agregar-productos.php?edit=<?php echo $prod->getId()?>"><img class="icons" src="./assets/icon/lapiz.png" alt="Editar"></a>
                              <a href="productos.php?del=<?php echo $prod->getId()?>"><img class="icons" src="./assets/icon/eliminar.png" alt="Eliminar"></a>
                              <a href="productos.php?act=<?php echo $prod->getId()?>"><img class="icons" src="./assets/icon/activar.png" alt="Activar"></a>
                              <a href="productos.php?des=<?php echo $prod->getId()?>"><img class="icons" src="./assets/icon/desactivar.png" alt="Desactivar"></a>
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
                <a href="agregar-productos.php"><button type="button" class="btn btn-primary col-md-2" style="margin-top:-60px; float:right">Agregar</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>