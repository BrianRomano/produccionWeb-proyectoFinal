<!-- Header  -->
<?php include_once('./layouts/header.php') ?>

<!-- Agregar Producto - Editar Producto -->
  <?php 

    include_once('./../logic/ModelsBusiness.php');
    include_once('./../logic/CategoryBusiness.php');

    $ModB = new ModelsBusiness($con);
    $CatB = new CategoryBusiness($con);

    if(isset($_POST['addModel'])){

      unset($_POST['addModel']);
      
      if(!empty($_GET['edit'])){
        $ModB->modifyModel($_GET['edit'],$_POST);
      }else{
        $ModB->saveModel($_POST);
      }

      redirect('modelos.php');
    } 

    $id = 0;

    if(!empty($_GET['edit'])){
        $id = $_GET['edit'];
        $mod = $ModB->getModel($id);
        $nombreMod = $mod->getNombre();
        $activoMod = $mod->getActivo();
    }

    if($permiso == 'adm' || $permiso == 'cat'):
  ?>

<!-- Formulario de Modelos -->
  <body class="dark-edition">
  <h3 class="iniSesion">Modelos</h3><br><br>
      <div id="login" class = "agregar">
          <form action="" method="post">
            <div class="form-group">
              <label for="exampleDropdownFormEmail1" name="nombreMaterial" class ="titulo">Modelo</label>
              <input type="text" placeholder="Nombre" name="nombre" class="form-control" value="<?php echo isset($nombreMod)?$nombreMod:''?>">
              <?php 
                if(empty($_GET['edit'])) : ?>
                  <label for="exampleDropdownFormEmail1" name="nombreMaterial" class ="titulo">Marca</label>
                  <select name="categoria" multiple=multiple class="custom-select form-control-border" id="exampleSelectBorder">
                  <?php 
                    foreach($CatB->getCategories() as $cat): ?>
                      <option value="<?php echo $cat->getId()?>"><?php echo $cat->getNombre()?></option>
                  <?php 
                    endforeach; 
                  ?>
                </select>
              <?php 
                endif;
              ?>
              <?php  
                  if(!empty($_GET['edit'])) : ?>
                    <?php 
                      if($activoMod == "1") : 
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
                    <input id="radio2" type="radio" name="activo" value="2" checked>
                    <label for="radio2">Desactivar</label>
                  </div>
                <?php 
                  endif; 
                ?>
              <input type="submit" class="btn btn-primary loginBtn" name="addModel" value="Agregar">
            </div>
        </form>
      </div>
  </body>
  <?php endif; ?>
</html>