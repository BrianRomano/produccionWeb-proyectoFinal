<!-- HEADER -->
  <?php include_once('./layouts/header.php') ?>

<!-- ELIMINAR MARCA -->
  <?php 
    if(isset($_GET['del'])){
      $datos = file_get_contents('./../../../datos/marca.json');
      $datosJson = json_decode($datos,true);
      unset($datosJson[$_GET['del']]);
      $fp = fopen('./../../../datos/marca.json','w');
      $datosString = json_encode($datosJson);
      fwrite($fp,$datosString);
      fclose($fp);
      redirect('index.php');
    }
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
                            Acciones
                          </th>
                        </thead>
                        <tbody>
                          <?php 
                            $datos = file_get_contents("./../../../datos/marca.json");
                            $datosJson = json_decode($datos, true);
                            foreach($datosJson as $marc):
                          ?>
                          <tr>
                            <td>
                              <?php echo $marc['id_marca'] ?>
                            </td>
                            <td>
                              <?php echo $marc['nombre'] ?>   
                            </td>
                            <td>
                              <!-- ACTIVO  -->
                            </td>
                            <td>
                              <a href="agregar-marca.php?edit=<?php echo $marc['id_marca']?>"><img class="icons" src="./assets/icon/lapiz.png" alt="Editar"></a>
                              <a href="marcas.php?del=<?php echo $marc['id_marca']?>"><img class="icons" src="./assets/icon/eliminar.png" alt="Eliminar"></a>
                              <a href="marcas.php?act=<?php echo $marc['id_marca']?>"><img class="icons" src="./assets/icon/activar.png" alt="Activar"></a>
                              <a href="marcas.php?des=<?php echo $marc['id_marca']?>"><img class="icons" src="./assets/icon/desactivar.png" alt="Desactivar"></a>
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
                <a href="agregar-marca.php"><button type="button" class="btn btn-primary col-md-2" style="margin-top:-60px; float:right">Agregar</button></a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>