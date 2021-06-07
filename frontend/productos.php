<?php 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    /* HEADER */
    include('./layouts/header.php');

    include('./../logic/CategoryBusiness.php');
    include('./../logic/ModelsBusiness.php');
?>

    <div class = "contenido">

        <!-- FILTROS -->
        <aside id="aside">
            <div class="filtro">

            <!-- MARCAS -->
                <h4 class="tituloCat">Marcas</h4>
                <?php 
                    $catB = new CategoryBusiness($con);
                    foreach($catB->getCategories() as $cat):
                ?>
                <div> 
                    <li> 
                        <a href="productos.php?cat=<?php echo $cat->getId()?>"><?php echo $cat->getNombre()?></a>
                    </li>
                </div>
                <?php 
                    endforeach; 
                ?>
                <br>
                <!-- MODELOS -->
                <h4 class="tituloCat">Modelos</h4>
                <?php 
                    $modB = new ModelsBusiness($con);
                    foreach($modB->getModels() as $mod):
                ?>
                <div> 
                    <li> 
                        <a href="productos.php?mod=<?php echo $mod->getId()?>"><?php echo $mod->getNombre()?></a>
                    </li>
                </div>
                <?php 
                    endforeach; 
                ?> 

            <!-- BORRAR FILTROS -->
            <a href="productos.php">
                <input class="botonAside borrar" type="submit" value = "Borrar filtros">
            </a>

        </aside>

        <!-- ARTICULOS -->
        <section id="seccion">
        
            <h1 class = "titProductos productosInline">Productos</h1>

            <!-- ORDENAR POR -->
            <div class="dropdown ordenamiento">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ordenar por
                </button>
                <div class="dropdown-menu filtrosOrde" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="productos.php?dest=1">Destacados</a>
                    <a class="dropdown-item" href="productos.php?may">Mayor precio</a>
                    <a class="dropdown-item" href="productos.php?men">Menor precio</a>
                    <a class="dropdown-item" href="productos.php?rank">Mejor calificados</a>
                    <a class="dropdown-item borrarFiltrado" href="productos.php">Borrar filtros</a>
                </div>
            </div>

            <!-- MOSTRAR PRODUCTOS -->
            <?php 
                $ProdB = new ProductoBusiness($con);
                foreach($ProdB->getProductos($_GET) as $prod):
                    if($prod->getActivo() == 1):
            ?> 

            <!-- ARTICULO  -->
            <a href="detalle-producto.php?id=<?php echo $prod->getId() ?>">
                <article class="articulo">
                    <img class="imagenProducto" src="./../uploads/<?php echo $prod->getImagen() ?>" width="850" height="850">
                    <p>
                        <span id="tituloArticulo"><?php echo $prod->getTitulo() ?></span>
                        <span id="precioArticulo">$<?php echo $prod->getPrecio() ?></span><br>
                        <span id="descripcionArticulo"><?php echo $prod->getDescripcion() ?></span>
                    </p>
                </article>
            </a>    

            <?php      
                    endif; 
                endforeach;
            ?>

        </section>
    </div>
    
    <!-- FOOTER Y SCRIPTS -->
        <?php include_once('./layouts/footer.php') ?>
</body>
</html>