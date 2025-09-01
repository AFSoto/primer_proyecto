<?php
require_once './includes/conexion.php';
session_start();
if ($_SESSION['usuario'] && isset($_GET['id'])) {
    $entrada_id = $_GET['id'];
    $usuario_id = $_SESSION['usuario']['id'];
    $sql = "DELETE FROM entradas WHERE id = $entrada_id AND usuario_id = $usuario_id";
    $borrar = mysqli_query($db,$sql);
}
header('Location: ./vistas/index.php');

?>