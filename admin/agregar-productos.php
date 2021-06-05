<!-- HEADER  -->
  <?php include_once('./layouts/header.php') ?>

<!-- AGREGAR Productos - EDITAR Productos -->
  <?php 
    $datos = file_get_contents('./../../../datos/producto.json');
    $datosJson = json_decode($datos,true);

    if(isset($_POST['add'])){

      //Subir imagen
      if(isset($_FILES['imagen'])){
        $archivo = $_FILES["imagen"];
        $nombre = $archivo['name'];
        $tipo = $archivo["type"];

        //Condición de tipo de imagen
        if($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/gif"){
          //Guardar imagen en carpeta imagenes
          move_uploaded_file($archivo['tmp_name'], './../../../uploads/'.$nombre);
        }
      }

      if(isset($_GET['edit'])){
          $id = $_GET['edit'];
      }else{
          $id = date('Ymdhis');
      }

      $datosJson[$id] = array('id_producto'=>$id, 'nombre'=>$_POST['nombre'], 'precio'=>$_POST['precio'], 'imagen'=>$_FILES['imagen']['name'], 'descripcion'=>$_POST['descripcion'], 'activo'=>$_POST['activo'], 'destacado'=>$_POST['destacado'], 'id_categoria'=>$_POST['material'], 'id_marca'=>$_POST['marca']);
      $fp = fopen('./../../../datos/producto.json','w');
      $datosString = json_encode($datosJson);
      fwrite($fp,$datosString);
      fclose($fp);
      redirect('index.php');
    }

    if(isset($_GET['edit'])){
        $dato = $datosJson[$_GET['edit']];
    }
  ?>

  <body class="dark-edition">

    <div id="login" class = "agregar agregarProducto">

      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">

          <label for="exampleDropdownFormEmail1" name="nombreMaterial" class ="titulo">Nuevo producto</label>
          <input type="text" placeholder="Nombre" name="nombre" class="form-control" value="<?php echo isset($dato)?$dato['nombre']:''?>">
          <input type="text" placeholder="Precio" name="precio" class="form-control" value="<?php echo isset($dato)?$dato['precio']:''?>">
          <input type="text" placeholder="Descripción" name="descripcion" class="form-control" value="<?php echo isset($dato)?$dato['descripcion']:''?>">
          
          <select class="form-control" name="material">
            <option selected="true" disabled="disabled">Material</option>
            <?php 
              $datos = file_get_contents("./../../../datos/categoria.json");
              $datosJson = json_decode($datos, true);
              foreach($datosJson as $cat):
            ?>
              <option class="opciones" value="<?php echo $cat['id_categoria']?>"><?php echo $cat['nombre']?></option>
            <?php 
              endforeach;
            ?>
          </select>

          <select class="form-control" name="marca">
            <option selected="true" disabled="disabled">Marca</option>
            <?php 
              $datos = file_get_contents("./../../../datos/marca.json");
              $datosJson = json_decode($datos, true);
              foreach($datosJson as $marc):
            ?>
              <option class="opciones" value="<?php echo $marc['id_marca']?>"><?php echo $marc['nombre']?></option>
            <?php 
              endforeach;
            ?>
          </select>

          <div id="check">
            <input type="checkbox" class="form-check-input" name="activo">
            <label class="form-check-label">Disponible</label><br>
            <input type="checkbox" class="form-check-input" name="destacado">
            <label class="form-check-label">Destacado</label>
          </div>

          <div class="form-group">
            <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1">
            <input type="submit" class="btn btn-primary loginBtn2" name="add" value="Agregar">
          </div>

        </div>
      </form>
    </div>
  </body>
</html>