<!-- HEADER -->
<?php include_once('./layouts/header.php') ?> 

<!-- AGREGAR Producto - EDITAR Producto -->
  <?php 
    $datos = file_get_contents('./../../../datos/marca.json');
    $datosJson = json_decode($datos,true);

    if(isset($_POST['add'])){
      if(isset($_GET['edit'])){
          $id = $_GET['edit'];
      }else{
          $id = date('Ymdhis');
      }

      $datosJson[$id] = array('id_marca'=>$id, 'nombre'=>$_POST['nombre']);
      $fp = fopen('./../../../datos/marca.json','w');
      $datosString = json_encode($datosJson);
      fwrite($fp,$datosString);
      fclose($fp);
      redirect('index.php');
    }

    if(isset($_GET['edit'])){
        $dato = $datosJson[$_GET['edit']];
    }
  ?>

<!-- Formulario de Marcas -->
  <body class="dark-edition">
      <div id="login" class = "agregar">
      <form action="" method="post">
            <div class="form-group">
              <label for="exampleDropdownFormEmail1" class ="titulo">Nueva marca</label>
              <input type="text" placeholder="Nombre" name="nombre" class="form-control" value="<?php echo isset($dato)?$dato['nombre']:''?>">
              <input type="submit" class="btn btn-primary loginBtn" name="add" value="Agregar">
            </div>
        </form>
      </div>
  </body>
</html>