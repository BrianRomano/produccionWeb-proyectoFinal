    <div class="main-panel">

        <?php if($permiso == 'adm'): ?>
            <div class="card text-center" style="width: 18rem; display: inline-block; margin-left: 70px; ">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <a href="usuarios.php" class="btn btn-primary">Ver usuarios</a>
                </div>
            </div>
        <?php endif; ?>

        <?php if($permiso == 'adm' || $permiso == 'cat'): ?>
            <div class="card text-center" style="width: 18rem; display: inline-block; margin-left: 50px; ">
                <div class="card-body">
                    <h5 class="card-title">Marcas</h5>
                    <a href="categorias.php" class="btn btn-primary">Ver marcas</a>
                </div>
            </div>
        <?php endif; ?>

        <?php if($permiso == 'adm' || $permiso == 'cat'): ?>
            <div class="card text-center" style="width: 18rem; display: inline-block; margin-left: 50px; ">
                <div class="card-body">
                    <h5 class="card-title">Modelos</h5>
                    <a href="modelos.php" class="btn btn-primary">Ver modelos</a>
                </div>
            </div>
        <?php endif; ?>

        <?php if($permiso == 'adm' || $permiso == 'prod'): ?>
            <div class="card text-center" style="width: 18rem; display: inline-block; margin-left: 70px; ">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <a href="productos.php" class="btn btn-primary">Ver productos</a>
                </div>
            </div>
        <?php endif; ?>

        <?php if($permiso == 'adm' || $permiso == 'com'): ?>
            <div class="card text-center" style="width: 18rem; display: inline-block; margin-left: 50px; ">
                <div class="card-body">
                    <h5 class="card-title">Comentarios</h5>
                    <a href="comentarios.php" class="btn btn-primary">Ver comentarios</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>