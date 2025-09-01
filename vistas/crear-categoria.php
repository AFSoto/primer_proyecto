<?php include_once __DIR__ . '/../acciones/redireccion.php'; ?>
<?php include_once __DIR__ . '/../includes/cabecera.php'; ?>
<?php include_once __DIR__ . '/../includes/lateral.php'; ?>
    
<!-- caja principal -->
<div id="principal">
        <h1>crear categorias</h1>
        <p>añade nuevas categorias para que los usuarios puedan crear nuevas entradas</p><br>

    <form action="/PROYECTO_PHP/acciones/guardar-categoria.php" method="post">
            <label for="nombre">nombre de la categoria</label>
            <input type="text" name="nombre" id="nombre">

            <input type="submit" value="guardar">
        </form>
    </div>

    <?php require_once __DIR__ . '/../includes/pie.php'; ?>
