<?php 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    /* HEADER */
    include('./layouts/header.php');
?>

    <section>
        <!-- ESLOGAN Y FORMA DE PAGO -->
            <?php include_once('./includes/forma-de-pago.php')?>

        <!-- DESTACADOS -->
        <div class="container">
            <h1 id="titProductos">Destacados<span><a href="productos.php">Ver más</a></span></h1>
            <div class="row">
                <?php 
                    $ProdB = new ProductoBusiness($con);
                    foreach($ProdB->getProductos($_GET) as $prod):
                        if($prod->getDestacado() == 1 && $prod->getActivo() == 1):
                ?> 
                    <div class="col-6 col-md-6 col-sm-6 col-lg-3">
                        <article id="producto" class="mx-auto">
                            <a href="detalle-producto.php?id=<?php echo $prod->getId() ?>">
                                <img class="imgProducto img-fluid" src="./../uploads/<?php echo $prod->getImagen() ?>" width="850" height="850">
                                <p class="precio">$<?php echo $prod->getPrecio() ?></p>
                                <p class="descProducto"><?php echo $prod->getTitulo() ?></p>
                            </a>
                        </article>
                    </div>
                <?php 
                        endif;
                    endforeach;
                ?>
            </div>
        </div>
    </section>

    <!-- FOOTER Y SCRIPTS -->
        <?php include_once('./layouts/footer.php') ?>
    </body>
</html>
