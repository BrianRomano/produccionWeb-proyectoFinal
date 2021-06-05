<!-- HEADER -->
    <?php include_once('./layouts/header.php') ?>

        <section>
            <div class="container">
                <div class="row">

                <!-- FORMULARIO DE CONTACTO -->
                    <div class="col-12 col-md-12 col-sm-12 col-lg-6">
                        <form class ="contacto" action="#" method="POST">
                            <h1 id="titContacto">Formulario de Contacto</h1>
                            <div class="formCont">
                                <input type="text" name="nombre" placeholder="Nombre">
                                <input type="text" name="apellido" placeholder="Apellido">
                                <input type="tel" name="telefono" placeholder="Teléfono">
                                <input type="email" name="email" placeholder="Email">
                                <select name = "area">
                                    <option value = "online">Envios Online</option>
                                    <option value = "retiro">Retiro en sucursal</option>
                                    <option value = "deposito">Deposito</option>
                                    <option value = "admin">Administración</option>
                                </select>
                            </div>
                            <div class="mensaje">
                                <textarea name="mensaje" placeholder="Escriba su mensaje"></textarea>
                            </div>
                            <input class="enviar" type="submit" value="Enviar">
                        </form>
                    </div>

                <!-- INFORMACION DE CONTACTO -->
                    <div class="col-12 col-md-12 col-sm-12 col-lg-6">
                        <h1 id="titInfo">Información de Contacto</h1>
                        <div class="infoCont">
                            <img class="imgCont img-fluid" src="./assets/icons/informacion-de-contacto/contacto.png" width="512" height="512" alt="Teléfono">
                            <p>Venta Telefonica<br>(+5411)12345678</p>
                        </div>
                        <div class="infoCont">
                            <img class="imgCont img-fluid" src="./assets/icons/informacion-de-contacto/email.png" width="512" height="512" alt="Email">
                            <p>Venta Online<br>cases@cases.com</p>
                        </div>
                        <div class="infoCont">
                            <img class="imgCont img-fluid" src="./assets/icons/informacion-de-contacto/compra-online.png" width="512" height="512" alt="Compras Online">
                            <p>Comprá Online<br>y recíbelo en tu domicilio</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- FOOTER Y SCRIPTS -->
        <?php include_once('./layouts/footer.php') ?>   
    </body>
</html>
