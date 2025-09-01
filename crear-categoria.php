<?php include_once './redireccion.php'; ?>
<?php include_once './includes/cabecera.php'; ?>
<?php include_once './includes/lateral.php'; ?>
    
<!-- caja principal -->
<div id="principal">
        <h1>crear categorias</h1>
        <p>añade nuevas categorias para que los usuarios puedan crear nuevas entradas</p><br>

        <form action="guardar-categoria.php" method="post">
            <label for="nombre">nombre de la categoria</label>
            <input type="text" name="nombre" id="nombre">

            <input type="submit" value="guardar">
        </form>
    </div>

    <?php require_once './includes/pie.php'   ?>
