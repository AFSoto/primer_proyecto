<?php include_once __DIR__ . '/../acciones/redireccion.php'; ?>
<?php include_once __DIR__ . '/../includes/cabecera.php'; ?>
<?php include_once __DIR__ . '/../includes/lateral.php'; ?>
    
<!-- caja principal -->
<div id="principal">
        <h1>crear entradas</h1>
        <p>añade nuevas entradas para que los usuarios puedan leelar y disfrutar de nuetro contenidos</p><br>

    <form action="/PROYECTO_PHP/acciones/guardar-entrada.php" method="post">
            <label for="titulo">titulo</label>
            <input type="text" name="titulo" id="titulo">
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

            <label for="descripcion">descripcion</label>
            <textarea name="descripcion" id="descripcion"></textarea>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

            <label for="categoria">categoria</label>
            <select name="categoria" id="categoria">
                <?php $categorias = conseguirCategorias($db);
                if (!empty($categorias)) :
                    while ($categoria = mysqli_fetch_assoc($categorias)) :
                        ?>
                        <option value="<?= $categoria['id'] ?>">
                            <?= $categoria['nombre'] ?>
                        </option>
                <?php endwhile;
                endif; ?>
            </select>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>

            <input type="submit" value="guardar">
        </form>
        <?php borrarErrores(); ?>
    </div>

    <?php require_once __DIR__ . '/../includes/pie.php'; ?>
