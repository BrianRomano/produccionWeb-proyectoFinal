<!-- HEADER  -->
<?php 
    include_once('./layouts/header.php');  
    include_once('./../logic/CommentBusiness.php');

    $comB = new CommentBusiness($con);

    if(isset($_POST['editComment'])){

        unset($_POST['editComment']);

        if($_POST['activo']){
            $_POST['activo'] = '1';
        } else{
            $_POST['activo'] = '0';
        }

        $comB->ModifyComment($_GET['edit'], $_POST);

        redirect('comentarios.php');
    }
    
    $id = 0;

    if(!empty($_GET['edit'])){
        $id = $_GET['edit'];
    }

    if($permiso == 'adm' || $permiso == 'com'):
?>
<!-- ACTIVAR/DESACTIVAR COMENTARIOS-->
<body class="dark-edition">
  <h3 class="iniSesion">Comentarios</h3><br><br>
      <div id="login" class = "agregar">
        <form action="" method="post">
              <div class="form-group">
                <label for="exampleDropdownFormEmail1" class ="titulo">Activar / Desactivar </label>
                <label for="activo">Activar</label>
                <input type="checkbox" value="Activo" name="activo"><br>
                <input type="submit" class="btn btn-primary loginBtn" name="editComment" value="Modificar">
              </div>
        </form>
      </div>
  </body>
  <?php endif; ?>
</html>


