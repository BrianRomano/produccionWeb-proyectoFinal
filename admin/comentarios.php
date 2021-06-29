<!-- Header  -->
<?php include_once('./layouts/header.php') ?>

<?php

  include_once('./../logic/CommentBusiness.php');
  include_once('./../logic/ProductoBusiness.php');

  $ComB = new CommentBusiness($con);

  if($permiso == 'adm' || $permiso == 'com'):
?>

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
                            Comentario
                          </th>
                          <th>
                            Puntuación
                          </th>
                          <th>
                            Fecha
                          </th>
                          <th>
                            Producto
                          </th>
                          <th>
                            <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Activo
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="comentarios.php">Borrar filtro</a>
                              <a class="dropdown-item" href="comentarios.php?activo=1">Si</a>
                              <a class="dropdown-item" href="comentarios.php?activo=0">No</a>
                            </div>
                          </div>
                          </th>
                          <th>
                            Acción
                          </th>
                        </thead>
                        <!-- Fin de Columnas -->

                        <!-- Inicio de Filas -->
                        <tbody>
                          <?php 
                              foreach($ComB->getComments() as $com):
                                $imprimir = true;

                                //Comprobar si existe un filtro
                                if(isset($_GET['activo'])){
                                  $imprimir = true;
                                  
                                  //Filtrar
                                  if($com->getActivo() != $_GET['activo']){
                                    $imprimir = false;
                                  }

                                }

                                if($imprimir):
                          ?>
                            <tr>
                              <td>
                                <?php echo $com->getId()?>
                              </td>
                              <td>
                                <?php echo $com->getComentario()?>
                              </td>
                              <td>
                                <?php echo $com->getRank()?>
                              </td>
                              <td>
                                <?php echo $com->getFecha()?>
                              </td>
                              <td>
                                <?php echo $com->getProducto()->getTitulo()?>
                              </td>
                              <td>
                                <?php 
                                  if($com->getActivo() == 1){
                                    echo 'Si';
                                  } else {
                                    echo 'No';
                                  }
                                ?>
                              </td>
                              <td>
                                <a href="modificar-comentario.php?edit=<?php echo $com->getId()?>"><img class="icons" src="./assets/icon/lapiz.png" alt="Editar"></a>
                              </td>
                            </tr>
                          <?php 
                                endif;
                              endforeach;
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
  <?php endif; ?>
</html>