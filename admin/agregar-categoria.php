<!-- HEADER -->
<?php include_once('./layouts/header.php') ?> 

<!-- AGREGAR Producto - EDITAR Producto -->
  <?php 

    include_once('./../logic/CategoryBusiness.php');

    $Catb = new CategoryBusiness($con);

    if(isset($_POST['addCategory'])){

      unset($_POST['addCategory']);
      
      if(!empty($_GET['edit'])){
          $Catb->modifyCategory($_GET['edit'],$_POST);
      }else{
          $Catb->saveCategory($_POST);
      }

      redirect('categorias.php');
    } 

    $id = 0;

    if(!empty($_GET['edit'])){
        $id = $_GET['edit'];
    }

    $cat = $Catb->getCategorie($id);

    if($permiso == 'adm' || $permiso == 'cat'):      
  ?>
<!-- Formulario de Marcas -->
  <body class="dark-edition">
  <h3 class="iniSesion">Marcas</h3><br><br>
      <div id="login" class = "agregar">
      <form action="" method="post">
            <div class="form-group">
              <label for="exampleDropdownFormEmail1" class ="titulo">Nueva marca</label>
              <input type="text" placeholder="Nombre" name="nombre" class="form-control" value="<?php echo isset($dato)?$dato['nombre']:''?>">
              <input type="submit" class="btn btn-primary loginBtn" name="addCategory" value="Agregar">
            </div>
        </form>
      </div>
  </body>
  <?php endif; ?>
</html>