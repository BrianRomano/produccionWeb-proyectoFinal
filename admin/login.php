<!DOCTYPE html>
<html lang="es">
<head>
    <title>Panel de administración</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--    Fuente e iconos    -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>

<body class="dark-edition">
    <h3 class="iniSesion">Iniciar sesión</h3>
    <div id="login">
        <?php
            if(isset($_GET['errAth'])){
                echo 'Error de Autenticación.';
            }
        ?>
        <form action="index.php" method="post">
            <label for="user" class="titulo">Usuario</label>
            <input type="text" class="form-control" id="exampleDropdownFormEmail1" name="user" placeholder="Usuario">
            <label for="password" class="titulo">Contraseña</label>
            <input type="password" class="form-control" id="exampleDropdownFormEmail1" name="pass" placeholder="Contraseña">
            <button type="submit" class="btn btn-primary loginBtn" name="login">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>