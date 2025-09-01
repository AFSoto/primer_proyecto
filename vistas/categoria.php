<?php require_once __DIR__ . '/../includes/cabecera.php'; ?>
<?php $categoria_actual = conseguirCategoria($db,$_GET['id']);
if (!isset($categoria_actual['id'])) {
    header('Location: ./vistas/index.php');
}
?>

    <?php require_once __DIR__ . '/../includes/lateral.php'; ?>
    <!-- caja principal -->

    <div id="principal">
        
        <h1>entradas de <?= $categoria_actual['nombre'] ?></h1>
        <?php $entradas = conseguirEntradas($db,null,$_GET['id']);
            if (!empty($entradas) && mysqli_num_rows($entradas)>=1) :
                while ($entrada = mysqli_fetch_assoc($entradas)) :
                    ?>
                    <article class="entrada">
            <a href="/PROYECTO_PHP/vistas/entrada.php?id=<?= $entrada['id'] ?>">
                <h2><?= $entrada['titulo'] ?></h2>
                <span class="fecha"><?= $entrada['categoria'].' '.$entrada['fecha'] ?></span>
                <p>
                    <?= substr($entrada['descripcion'],0,180)."..." ?>
                </p>
            </a>
        </article>
            <?php endwhile; 
            else :
                echo "<div class='alerta'>no hay entradas en esta categoria</div>";
            endif ?>
        
    </div>

    <?php require_once __DIR__ . '/../includes/pie.php'; ?>

