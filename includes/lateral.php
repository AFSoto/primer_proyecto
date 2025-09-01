

<!-- barra lateral -->
        <aside id="sidebar">
        
        <div id="buscador" class="bloque">
                <h3>buscar</h3>

                <?php if (isset($_SESSION['error_login'])) : ?>
            <div class="alerta alerta-error">
                <?=$_SESSION['error_login']?>
            </div>
                <?php endif ?>

                <form action="./vistas/buscar.php" method="post">
                    <input type="text" name="busqueda" id="">
                    <input type="submit" value="buscar">
                    
                </form>
            </div>




            
                <?php if (isset($_SESSION['usuario'])) : ?>
                <div id="usuario-logueado" class="bloque">
                <h3>Bienvenido, <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'] ?></h3>
                <!-- botones -->
                
                <a href="./vistas/crear-entradas.php" class="boton boton-naranja">crear entradas</a>
                <a href="./vistas/crear-categoria.php" class="boton">crear categorias</a>
                <a href="./vistas/crear-entradas.php" class="boton">crear entrada</a>
                <a href="./vistas/mis-datos.php" class="boton boton-naranja">mis datos</a>
                <a href="./acciones/cerrar.php" class="boton boton-rojo">cerrar sesion</a>

            </div>
            <?php endif ?>
            
            <?php if (!isset($_SESSION['usuario'])) : ?>
            <div id="login" class="bloque">
                <h3>Identificate</h3>

                <?php if (isset($_SESSION['error_login'])) : ?>
            <div class="alerta alerta-error">
                <?=$_SESSION['error_login']?>
            </div>
                <?php endif ?>

                <form action="./acciones/login.php" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                    <label for="password">contraseña</label>
                    <input type="password" name="password" id="password">

                    <input type="submit" value="entrar">
                </form>
            </div>

            <div id="register" class="bloque">

                <!-- mostrar errores -->
                <h3>Registrate</h3>
                <?php if (isset($_SESSION['completado'])) : ?>
                    <div class="alerta alerta-exito">
                        <?=$_SESSION['completado']?>
                    </div>
                    
                <?php elseif (isset($_SESSION['errores']['general'])):?> 
                    <div class="alerta alerta-error">
                        <?=$_SESSION['errores']['general']?>
                    </div>
                ?>
                    
                    <?php endif  ?>

                <form action="./acciones/registro.php" method="post">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>


                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>


                    <label for="password">contraseña</label>
                    <input type="password" name="password" id="password">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>


                    <input type="submit" name="submit" value="resgistrarse">
                </form>
                <?php borrarErrores() ?>
            </div>
            <?php endif ?>
        </aside>