<?php include_once __DIR__ . '/../acciones/redireccion.php'; ?>
<?php require_once __DIR__ . '/../includes/conexion.php'; ?>
<?php require_once __DIR__ . '/../includes/helpers.php'; ?>
<?php $entrada_actual = conseguirEntrada($db,$_GET['id']);
if (!isset($entrada_actual['id'])) {
    header('Location: index.php');
}
?>

    <?php require_once __DIR__ . '/../includes/cabecera.php'; ?>
    <?php require_once __DIR__ . '/../includes/lateral.php'; ?>
    
        
<!-- caja principal -->
<div id="principal">
        <h1>editar entradas</h1>
        <p>edita tu entrada <?= $entrada_actual['titulo'] ?></p><br>

    <form action="./acciones/guardar-entrada.php?editar=<?= $entrada_actual['id'] ?>" method="post">
            <label for="titulo">titulo</label>
            <input type="text" name="titulo" id="titulo" value="<?= $entrada_actual['titulo'] ?>">
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

            <label for="descripcion">descripcion</label>
            <textarea name="descripcion" id="descripcion"><?= $entrada_actual['descripcion'] ?></textarea>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

            <label for="categoria">categoria</label>
            <select name="categoria" id="categoria">
                <?php $categorias = conseguirCategorias($db);
                if (!empty($categorias)) :
                    while ($categoria = mysqli_fetch_assoc($categorias)) :
                        ?>
                        <option value="<?= $categoria['id'] ?>" <?= ($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : '' ?>>
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