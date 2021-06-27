<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="./../assets/img/sidebar-2.jpg">
        <div class="logo">
            <a href="index.php" class="simple-text logo-normal">
            Tablas
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="material-icons">dashboard</i>
                        <p>Inicio</p>
                    </a>
                </li>
                <?php if($permiso == 'adm'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">
                            <i class="material-icons">content_paste</i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($permiso == 'adm' || $permiso == 'cat'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="categorias.php">
                            <i class="material-icons">content_paste</i>
                            <p>Marcas</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($permiso == 'adm' || $permiso == 'cat'): ?> 
                    <li class="nav-item">
                        <a class="nav-link" href="modelos.php">
                            <i class="material-icons">content_paste</i>
                            <p>Modelos</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($permiso == 'adm' || $permiso == 'prod'): ?> 
                    <li class="nav-item">
                        <a class="nav-link" href="productos.php">
                            <i class="material-icons">content_paste</i>
                            <p>Productos</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($permiso == 'adm' || $permiso == 'com'): ?> 
                    <li class="nav-item">
                        <a class="nav-link" href="comentarios.php">
                            <i class="material-icons">library_books</i>
                            <p>Comentarios</p>
                        </a>
                    </li>
                <?php endif; ?>

                <a href="index.php?logout"><button type="submit" class="btn btn-primary sesionBtn">Cerrar sesión</button></a>
            </ul>
        </div>
    </div>