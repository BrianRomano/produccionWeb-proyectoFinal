<!-- Header  -->
<?php include_once('./layouts/header.php') ?>

  <body class="dark-edition">
    <!-- Barra Lateral -->
      <?php include_once('./layouts/aside.php')?> 
    
    <!-- Tabla de Comentarios -->
      <div class="main-panel">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-plain">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0">Comentarios</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover">

                        <!-- Inicio De Columnas -->
                        <thead>
                          <th>
                            ID
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Comentario
                          </th>
                          <th>
                            Puntuación
                          </th>
                          <th>
                            Fecha
                          </th>
                          <th>
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                A / D
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="">Borrar filtro</a>
                                <a class="dropdown-item" href="">Activos</a>
                                <a class="dropdown-item" href="">Inactivos</a>
                              </div>
                            </div>
                          </th>
                          <th>
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ID Producto
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="index.php">Borrar filtro</a>
                                <?php 
                                  $datosProd = file_get_contents('./../../../datos/producto.json');
                                  $producto = json_decode($datosProd, true);
                                  foreach($producto as $prod):
                                ?>
                                  <a class="dropdown-item" href="comentarios.php?id=<?php echo $prod['id_producto']?>"><?php echo $prod['id_producto']?></a>
                                <?php
                                  endforeach;
                                ?>
                              </div>
                            </div>
                          </th>
                          <th>
                            Acciones
                          </th>
                        </thead>
                        <!-- Fin de Columnas -->

                        <!-- Inicio de Filas -->
                        <tbody>
                          <?php 
                            $datos = file_get_contents("./../../../datos/comentario.json");
                            $datosJson = json_decode($datos, true);
                            if(!empty($datosJson)):
                              foreach($datosJson as $com):
                                $imprimir = true;
                                //Comprobar si existe un filtro
                                if(isset($_GET['id'])){
                                  $imprimir = true;
                                  //Filtrar
                                  if($com['id_producto'] != $_GET['id']){
                                    $imprimir = false;
                                  }
                                }
                                if($imprimir):
                          ?>
                            <tr>
                              <td>
                                <?php echo $com['id_comentario']?>
                              </td>
                              <td>
                                <?php echo $com['email']?>
                              </td>
                              <td>
                                <?php echo $com['comentario']?>
                              </td>
                              <td>
                                <?php echo $com['calificacion']?>
                              </td>
                              <td>
                               <!-- FECHA -->
                              </td>
                              <td>
                               <!-- ACTIVO -->
                              </td>
                              <td>
                                <?php echo $com['id_producto']?>
                              </td>
                              <td>
                                <a href="comentarios.php"><button type="submit" class="btn btn-primary sesionBtn">Activar</button></a>
                              </td>
                            </tr>
                          <?php 
                                endif;
                              endforeach;
                            endif;
                          ?>
                        </tbody>
                        <!-- Fin de Filas -->
                        
                      </table>
                    </div>
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
</html>