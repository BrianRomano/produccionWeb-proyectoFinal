<!-- HEADER  -->
  <?php include_once('./layouts/header.php') ?>

<!-- AGREGAR Productos - EDITAR Productos -->
  <?php 

    include_once('./../logic/ProductoBusiness.php');
    include_once('./../logic/ModelsBusiness.php');
    include_once('./../logic/CategoryBusiness.php');

    $ProdB = new ProductoBusiness($con);
    $ModB = new ModelsBusiness($con);
    $CatB = new CategoryBusiness($con);

    if(isset($_POST['addProducto'])){
      unset($_POST['addProducto']);

      //Subir imagen
      if(isset($_FILES['imagen'])){
        
        $archivo = $_FILES["imagen"];
        $nombre = $archivo['name'];
        $tipo = $archivo["type"];

        //Condición de tipo de imagen
        if($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/gif"){
          //Guardar imagen en carpeta imagenes
          move_uploaded_file($archivo['tmp_name'], './../uploads/'.$nombre);
        }

      } 

      $_POST['imagen'] = $nombre;
        
      if($_POST['activo']){
        $_POST['activo'] = '1';
      } else{
        $_POST['activo'] = '0';
      }

      if($_POST['destacado']){
        $_POST['destacado'] = '1';
      } else{
        $_POST['destacado'] = '0';
      }
    
      if(!empty($_GET['edit'])){
        $ProdB->modifyProducto($_GET['edit'],$_POST);
      }else{
        $ProdB->saveProducto($_POST);
      }

      redirect('productos.php');
    } 

    $id = 0;

    if(!empty($_GET['edit'])){
        $id = $_GET['edit'];
    }

    if($permiso == 'adm' || $permiso == 'prod'):
  ?>

  <body class="dark-edition">

    <div id="login" class = "agregar agregarProducto">

      <form action="" method="post" enctype="multipart/form-data">
          <label for="exampleDropdownFormEmail1" class ="titulo">Producto</label>
          <input type="text" placeholder="Nombre" name="titulo" class="form-control">
          <input type="text" placeholder="Precio" name="precio" class="form-control">
          <input type="text" placeholder="Descripción" name="descripcion" class="form-control">
          <label for="exampleDropdownFormEmail1" class ="titulo">Marca</label>
          <select name="categoria" multiple=multiple class="custom-select form-control-border" id="exampleSelectBorder">
              <?php foreach($CatB->getCategories() as $cat): ?>
                  <option value="<?php echo $cat->getId()?>"><?php echo $cat->getNombre()?></option>
              <?php endforeach; ?>
          </select>

          <label for="exampleDropdownFormEmail1" class ="titulo">Modelo</label>
          <select name="modelo" multiple=multiple class="custom-select form-control-border" id="exampleSelectBorder">
              <?php foreach($ModB->getModels() as $mod): ?>
                  <option value="<?php echo $mod->getId()?>"><?php echo $mod->getNombre()?></option>
              <?php endforeach; ?>
          </select>
          <label for="destacado">Destacado</label>
          <input type="checkbox" value="Destacado" name="destacado"><br>
          <label for="activo">Activar</label>
          <input type="checkbox" value="Activo" name="activo"><br>
          <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1">
          <input type="submit" class="btn btn-primary loginBtn2" name="addProducto" value="Agregar">
      </form>
    </div>
  </body>
  <?php endif; ?>
</html>