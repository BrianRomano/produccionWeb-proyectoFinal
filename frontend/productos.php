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
                <?php 
                    $catB = new CategoryBusiness($con);
                    $modB = new ModelsBusiness($con);
                    foreach($catB->getCategories() as $cat):
                        if($cat->getActivo() == "1"):
                ?>
                <div> 
                    <li> 
                        <h5><a href="productos.php?cat=<?php echo $cat->getId()?>&mod=<?php echo isset($_GET['mod']) ? $_GET['mod'] : ' '?>"><?php echo $cat->getNombre()?></a></h5><br>
                        <?php 
                            foreach($modB->getModels() as $mod):
                                if(isset($_GET['cat'])):
                                    if($mod->getCategoria()->getId() == $cat->getId() && $mod->getActivo() == "1"):
                        ?>
                        <a href="productos.php?mod=<?php echo $mod->getId()?>&cat=<?php echo isset($_GET['cat']) ? $_GET['cat'] : ' '?>"><?php echo $mod->getNombre()?></a><br>
                        <?php 
                                    endif;
                                endif;
                            endforeach; 
                        ?>
                    </li><hr>
                </div>
                <?php 
                        endif;
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
                    <a class="dropdown-item" href="productos.php?dest=1&cat=<?php echo isset($_GET['cat']) ? $_GET['cat'] : ''?>&mod=<?php echo isset($_GET['mod']) ? $_GET['mod'] : ''?>">Destacados</a>
                    <a class="dropdown-item" href="productos.php?asc=asc&cat=<?php echo isset($_GET['cat']) ? $_GET['cat'] : ''?>&mod=<?php echo isset($_GET['mod']) ? $_GET['mod'] : ''?>">A-Z</a>
                    <a class="dropdown-item" href="productos.php?desc=desc&cat=<?php echo isset($_GET['cat']) ? $_GET['cat'] : ''?>&mod=<?php echo isset($_GET['mod']) ? $_GET['mod'] : ''?>">Z-A</a>
                    <a class="dropdown-item" href="productos.php?rank&cat=<?php echo isset($_GET['cat']) ? $_GET['cat'] : ''?>&mod=<?php echo isset($_GET['mod']) ? $_GET['mod'] : ''?>">Mejor calificados</a>
                    <a class="dropdown-item borrarFiltrado" href="productos.php">Borrar filtros</a>
                </div>
            </div>

            <!-- MOSTRAR PRODUCTOS --> 
            <?php 
                $ProdB = new ProductoBusiness($con);
                foreach($ProdB->getProductos($_GET) as $prod): 
                    if($prod->getActivo() == "1" && $prod->getCategoria()->getActivo() == "1" && $prod->getModelo()->getActivo() == "1"):
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