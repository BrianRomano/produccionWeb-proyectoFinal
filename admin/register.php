<?php

    include('./layouts/header.php');

    include('./../logic/UserBusiness.php');
    include('./../logic/PerfilBusiness.php');

    $bUser = new UserBusiness($con);
    $bPerfil = new PerfilBusiness($con);


    if(isset($_POST['userSubmit'])){

        unset($_POST['userSubmit']);
        
        if(!empty($_GET['edit'])){
            $bUser->modifyUser($_GET['edit'],$_POST);
        }else{
            $bUser->saveUser($_POST);
        }

        redirect('usuarios.php');
    }

    $id = 0;

    if(!empty($_GET['edit'])){
        $id = $_GET['edit'];
    }

    $user = $bUser->getUser($id);
?> 

<body class="dark-edition">
    <h3 class="iniSesion">Registrarse</h3>
    <div id="login">
        <form action="" method="post">
            <label for="exampleInputEmail1" class="titulo">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $user->getNombre() ?>" id="exampleDropdownFormEmail1">
            <label for="exampleInputEmail1" class="titulo">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $user->getEmail() ?>" id="exampleDropdownFormEmail1">
            <label for="exampleInputEmail1" class="titulo">Usuario</label>
            <input type="text" class="form-control" name="user" value="<?php echo $user->getUSer() ?>" id="exampleDropdownFormEmail1">
            <label for="exampleInputPassword1" class="titulo">Password</label>
            <input type="password" class="form-control" name="password" id="exampleDropdownFormEmail1">
            <label for="exampleInputPassword1" class="titulo">Perfiles</label>
            <select name="perfiles[]" multiple=multiple class="custom-select form-control-border" id="exampleSelectBorder">
                <?php foreach($bPerfil->getPerfiles() as $perfil): ?>
                    <option value="<?php echo $perfil->getId()?>" <?php echo $user->poseePerfil($perfil->getId())?'selected':'' ?>><?php echo $perfil->getNombre()?></option>
                <?php endforeach; ?>
            </select>
                <button type="submit" name="userSubmit" class="btn btn-primary loginBtn">Registrar</button>
        </form>
    </div>
</body>
</html>