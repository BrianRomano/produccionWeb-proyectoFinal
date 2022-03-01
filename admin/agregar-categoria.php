<!-- HEADER -->
<?php include_once('./layouts/header.php') ?> 

<!-- AGREGAR PRODUCTO - EDITAR PRODUCTO -->
  <?php 

    include_once('./../logic/CategoryBusiness.php');

    $Catb = new CategoryBusiness($con); 

    if(isset($_POST['addCategory'])){

      unset($_POST['addCategory']);

      if(!empty($_GET['edit'])){
          $Catb->modifyCategory($_GET['edit'], $_POST);
      }else{
          $Catb->saveCategory($_POST);          
      }

      redirect('categorias.php');
    } 

    $id = 0; 

    if(!empty($_GET['edit'])){
        $id = $_GET['edit'];
        $cat = $Catb->getCategorie($id);
        $nombreCat = $cat->getNombre();
        $activoCat = $cat->getActivo();
    }

    if($permiso == 'adm' || $permiso == 'cat'):      
  ?>
<!-- Formulario de Marcas -->
  <body class="dark-edition">
  <h3 class="iniSesion">Marcas</h3><br><br>
      <div id="login" class = "agregar">
        <form action="" method="post">
              <div class="form-group">
                <label for="exampleDropdownFormEmail1" class ="titulo">Nueva marca</label>
                <input type="text" placeholder="Nombre" name="nombre" class="form-control" value="<?php echo isset($nombreCat) ? $nombreCat : '' ?>">
                <?php  
                  if(!empty($_GET['edit'])) : ?>
                    <?php 
                      if($activoCat == "1") : 
                    ?>
                    <div>
                      <input id="radio1" type="radio" name="activo" value="1" checked>
                      <label for="radio1">Activar</label>
                      <input id="radio2" type="radio" name="activo" value="2">
                      <label for="radio2">Desactivar</label>
                    </div>
                    <?php 
                      else:
                    ?>
                    <div>
                      <input id="radio1" type="radio" name="activo" value="1">
                      <label for="radio1">Activar</label>
                      <input id="radio2" type="radio" name="activo" value="2" checked>
                      <label for="radio2">Desactivar</label>
                    </div>
                    <?php 
                      endif; 
                    ?>
                <?php 
                  else:
                ?>
                <div>
                  <input id="radio1" type="radio" name="activo" value="1">
                  <label for="radio1">Activar</label>
                  <input id="radio2" type="radio" name="activo" value="2">
                  <label for="radio2">Desactivar</label>
                </div>
                <?php 
                  endif; 
                ?>
                <input type="submit" class="btn btn-primary loginBtn" name="addCategory" value="Agregar">
              </div>
        </form>
      </div>
  </body>
  <?php endif; ?>
</html>