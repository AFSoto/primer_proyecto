<?php require_once __DIR__ . '/../includes/cabecera.php'; ?>

    <?php require_once __DIR__ . '/../includes/lateral.php'; ?>
    <!-- caja principal -->

    <div id="principal">
        <h1>Todas las  entradas</h1>
        <?php $entradas = conseguirEntradas($db,null);
            if (!empty($entradas)) :
                while ($entrada = mysqli_fetch_assoc($entradas)) :
                    ?>
                    <article class="entrada">
            <a href="./vistas/entrada.php?id=<?= $entrada['id'] ?>">
                <h2><?= $entrada['titulo'] ?></h2>
                <span class="fecha"><?= $entrada['categoria'].' '.$entrada['fecha'] ?></span>
                <p>
                    <?= substr($entrada['descripcion'],0,180)."..." ?>
                </p>
            </a>
        </article>
            <?php endwhile; endif?>
        
    </div>

    <?php require_once __DIR__ . '/../includes/pie.php'; ?>