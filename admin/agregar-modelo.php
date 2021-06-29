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

      if($_POST['activo']){
        $_POST['activo'] = '1';
      } else{
        $_POST['activo'] = '0';
      }
      
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
    }

    $mod = $ModB->getModels($id);

    if($permiso == 'adm' || $permiso == 'cat'):
  ?>

<!-- Formulario de Materiales -->
  <body class="dark-edition">
  <h3 class="iniSesion">Modelos</h3><br><br>
      <div id="login" class = "agregar">
          <form action="" method="post">
            <div class="form-group">
              <label for="exampleDropdownFormEmail1" name="nombreMaterial" class ="titulo">Modelo</label>
              <input type="text" placeholder="Nombre" name="nombre" class="form-control" value="<?php echo isset($dato)?$dato['nombre']:''?>">
              <label for="exampleDropdownFormEmail1" name="nombreMaterial" class ="titulo">Marca</label>
              <select name="categoria" multiple=multiple class="custom-select form-control-border" id="exampleSelectBorder">
                <?php foreach($CatB->getCategories() as $cat): ?>
                    <option value="<?php echo $cat->getId()?>"><?php echo $cat->getNombre()?></option>
                <?php endforeach; ?>
              </select>
              <label for="activo">Activar</label>
              <input type="checkbox" value="Activo" name="activo"><br>
              <input type="submit" class="btn btn-primary loginBtn" name="addModel" value="Agregar">
            </div>
        </form>
      </div>
  </body>
  <?php endif; ?>
</html>