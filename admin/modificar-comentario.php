<!-- HEADER  -->
<?php 
    include_once('./layouts/header.php');  
    include_once('./../logic/CommentBusiness.php');

    $comB = new CommentBusiness($con);

    if(isset($_POST['editComment'])){

        unset($_POST['editComment']);

        $comB->ModifyComment($_GET['edit'], $_POST);

        redirect('comentarios.php');
    }
    
    $id = 0;

    if(!empty($_GET['edit'])){
        $id = $_GET['edit'];
        $com = $comB->getComment($id);
        $activoCom = $com->getActivo();
    }

    if($permiso == 'adm' || $permiso == 'com'):
?>
<!-- ACTIVAR/DESACTIVAR COMENTARIOS-->
<body class="dark-edition">
  <h3 class="iniSesion">Comentarios</h3><br><br>
      <div id="login" class = "agregar">
        <form action="" method="post">
          <?php  
            if(!empty($_GET['edit'])) : ?>
              <?php 
                if($activoCom == "1") : 
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
        <input type="submit" class="btn btn-primary loginBtn" name="editComment" value="Agregar">
        </form>
      </div>
  </body>
  <?php endif; ?>
</html>


