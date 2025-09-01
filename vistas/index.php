<?php require_once __DIR__ . '/../includes/cabecera.php'; ?>

<?php require_once __DIR__ . '/../includes/lateral.php'; ?>
    <!-- caja principal -->

    <div id="principal">
        <h1>Ultimas entradas</h1>
        <?php $entradas = conseguirEntradas($db,true);
            if (!empty($entradas)) :
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
            <?php endwhile; endif?>
        

        <div id="ver-todas">
            <a href="/PROYECTO_PHP/vistas/entradas.php">ver todas la entradas</a>
        </div>
    </div>

    <?php require_once __DIR__ . '/../includes/pie.php'; ?>