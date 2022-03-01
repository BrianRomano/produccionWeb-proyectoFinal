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
      $prod = $ProdB->getProducto($id);
      $titulo = $prod->getTitulo();
      $precio = $prod->getPrecio();
      $descripcion = $prod->getDescripcion();
      $activo = $prod->getActivo();
      $destacado = $prod->getDestacado();
    }

    if($permiso == 'adm' || $permiso == 'prod'):
  ?>

  <body class="dark-edition">

    <div id="login" class = "agregar agregarProducto">

      <form action="" method="post" enctype="multipart/form-data">
          <label for="exampleDropdownFormEmail1" class ="titulo">Producto</label>
          <input type="text" placeholder="Nombre" name="titulo" class="form-control" value="<?php echo isset($titulo) ? $titulo : '' ?>">
          <input type="text" placeholder="Precio" name="precio" class="form-control" value="<?php echo isset($precio) ? $precio : '' ?>">
          <input type="text" placeholder="Descripción" name="descripcion" class="form-control" value="<?php echo isset($descripcion) ? $descripcion : '' ?>">
          <?php 
            if(empty($_GET['edit'])) : ?>
              <label for="exampleDropdownFormEmail1" class ="titulo">Marca</label>
              <select name="categoria" multiple=multiple class="custom-select form-control-border" id="exampleSelectBorder">
                <?php foreach($CatB->getCategories() as $cat): ?>
                  <option value="<?php echo $cat->getId()?>"><?php echo $cat->getNombre()?></option>
                <?php endforeach; ?>
              </select>
          <?php 
            endif;
          ?>
          <?php 
            if(empty($_GET['edit'])) : ?>
              <label for="exampleDropdownFormEmail1" class ="titulo">Modelo</label>
              <select name="modelo" multiple=multiple class="custom-select form-control-border" id="exampleSelectBorder">
                <?php foreach($ModB->getModels() as $mod): ?>
                  <option value="<?php echo $mod->getId()?>"><?php echo $mod->getNombre()?></option>
                <?php endforeach; ?>
              </select>
          <?php 
            endif;
          ?>
          <?php  
            if(!empty($_GET['edit'])) : ?>
              <?php 
                if($destacado == "1") : 
              ?>
                <div>
                  <input id="radio1" type="radio" name="destacado" value="1" checked>
                  <label for="radio1">Destacado</label>
                  <input id="radio2" type="radio" name="destacado" value="2">
                  <label for="radio2">No Destacado</label>
                </div>
              <?php 
                else:
              ?>
                <div>
                  <input id="radio1" type="radio" name="destacado" value="1">
                  <label for="radio1">Destacado</label>
                  <input id="radio2" type="radio" name="destacado" value="2" checked>
                  <label for="radio2">No Destacado</label>
                </div>
              <?php 
                endif; 
              ?>
          <?php 
            else:
          ?>
            <input id="radio1" type="radio" name="destacado" value="1">
              <label for="radio1">Destacado</label>
              <input id="radio2" type="radio" name="destacado" value="2">
              <label for="radio2">No Destacado</label>
            </div>
          <?php 
            endif; 
          ?>
          <?php  
            if(!empty($_GET['edit'])) : ?>
              <?php 
                if($activo == "1") : 
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
          <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1">
          <input type="submit" class="btn btn-primary loginBtn2" name="addProducto" value="Agregar">
      </form>
    </div>
  </body>
  <?php endif; ?>
</html>