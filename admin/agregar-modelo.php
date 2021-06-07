<!-- Header  -->
<?php include_once('./layouts/header.php') ?>

<!-- Agregar Producto - Editar Producto -->
  <?php 

    include_once('./../logic/ModelsBusiness.php');
    $ModB = new ModelsBusiness($con);

    /*
    $datos = file_get_contents('./../../../datos/categoria.json');
    $datosJson = json_decode($datos,true);

    if(isset($_POST['add'])){
      if(isset($_GET['edit'])){
          $id = $_GET['edit'];
      }else{
          $id = date('Ymdhis');
      }

      $datosJson[$id] = array('id_categoria'=>$id, 'nombre'=>$_POST['nombre']);
      $fp = fopen('./../../../datos/categoria.json','w');
      $datosString = json_encode($datosJson);
      fwrite($fp,$datosString);
      fclose($fp);
      redirect('index.php');
    }

    if(isset($_GET['edit'])){
        $dato = $datosJson[$_GET['edit']];
    }
    */

  ?>

<!-- Formulario de Materiales -->
  <body class="dark-edition">
  <h3 class="iniSesion">Modelos</h3><br><br>
      <div id="login" class = "agregar">
          <form action="" method="post">
            <div class="form-group">
              <label for="exampleDropdownFormEmail1" name="nombreMaterial" class ="titulo">Nueva categorias</label>
              <input type="text" placeholder="Nombre" name="nombre" class="form-control" value="<?php echo isset($dato)?$dato['nombre']:''?>">
              <input type="submit" class="btn btn-primary loginBtn" name="add" value="Agregar">
            </div>
        </form>
      </div>
  </body>
</html>