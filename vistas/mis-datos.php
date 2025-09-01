<?php include_once __DIR__ . '/../acciones/redireccion.php'; ?>
<?php include_once __DIR__ . '/../includes/cabecera.php'; ?>
<?php include_once __DIR__ . '/../includes/lateral.php'; ?>
<!-- caja principal -->
<div id="principal">
    <h1>Mis datos</h1>
    <!-- mostrar errores -->
    <?php if (isset($_SESSION['completado'])) : ?>
        <div class="alerta alerta-exito">
            <?= $_SESSION['completado'] ?>
        </div>

    <?php elseif (isset($_SESSION['errores']['general'])): ?>
        <div class="alerta alerta-error">
            <?= $_SESSION['errores']['general'] ?>
        </div>
        

    <?php endif  ?>

    <form action="./acciones/actualizar-usuario.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?=$_SESSION['usuario']['nombre']?>" >
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" value="<?=$_SESSION['usuario']['nombre']?>">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>


        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?=$_SESSION['usuario']['email']?>">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

        <input type="submit" name="submit" value="actualizar">
    </form>
    <?php borrarErrores() ?>

    <form action=""></form>

</div>

<?php require_once __DIR__ . '/../includes/pie.php'; ?>