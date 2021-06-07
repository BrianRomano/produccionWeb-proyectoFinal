<?php 
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    /* HEADER */
    include('./layouts/header.php');

    /* COMENTARIOS*/
    include('./../logic/CommentBusiness.php');
?>

<!-- Cargar DETALLE DE PRODUCTO enviado por la URL -->
    <?php 
        $ProdB = new ProductoBusiness($con);
        $prod = $ProdB->getProducto($_GET['id']);
    ?>

    <div id="contenedor"> 

    <!-- DETALLE DE PRODUCTO -->
        <article class="articuloDetalle">
            <img class="imagenProductoDetalle" src="./../uploads/<?php echo $prod->getImagen() ?>" width="850" height="850">
            <p>
                <span id="tituloArticuloDetalle"><?php echo $prod->getTitulo() ?></span><br>
                <span id="precioArticuloDetalle">$<?php echo $prod->getPrecio() ?></span><br>
                <span id="descripcionArticuloDetalle"><?php echo $prod->getDescripcion() ?></span>
                <br><input class="botonDetalle comprar" type="submit" value = "Comprar">
                <br><input class="botonDetalle agregarCarrito" type="submit" value = "Agregar al carrito">
            </p>
        </article>

    <!-- COMENTAR -->
        <form class="comentarios" method="post">
            <h4>Califique el producto</h4>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Ingrese su email">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comentario</label>
                <textarea class="form-control" name="comentario" id="exampleFormControlTextarea1" rows="3" placeholder="Ingrese su comentario"></textarea>
            </div>
            <p class="clasificacion">
                <input id="radio1" type="radio" name="calificacion" value="5">
                <label for="radio1">★</label>
                <input id="radio2" type="radio" name="calificacion" value="4">
                <label for="radio2">★</label>
                <input id="radio3" type="radio" name="calificacion" value="3">
                <label for="radio3">★</label>
                <input id="radio4" type="radio" name="calificacion" value="2">
                <label for="radio4">★</label>
                <input id="radio5" type="radio" name="calificacion" value="1">
                <label for="radio5">★</label>
            </p>
            <input class="botonAside crear comentar" name="comentar" type="submit" value="Comentar">
        </form>

    <!-- COMENTARIOS -->
        <div class="comentarioRealizado">
            <?php     
                $ComB = new CommentBusiness($con);
                echo '<h4>Comentarios del producto</h4>';
                echo '<h6 class=promedioCalificacion>Promedio calificación: </h6>';
                
                foreach($ComB->getComments() as $com):
                    //Mostrar comentarios correspondiente al producto
                    if($com->getId() == $_GET['id']):
            ?>
                <article>
                    <p class = "nombreUsuario">
                        Email: <?php echo $com->getEmail() ?>
                    </p>
                    <p class = "comentarioUsuario">
                        <?php echo $com->getComentario() ?>
                    </p>
                    <p class="calificacionUsuario">
                        Calificación: <?php echo $com->getRank() ?>
                    </p>
                </article>
            <?php 
                    endif;
                endforeach; 
            ?>
        </div>
    </div>

    <!-- FOOTER Y SCRIPTS -->
        <?php include_once('./layouts/footer.php') ?>   
</body>
</html>
