

<?php

if (isset($_POST)) {
        //conexion a la base de datos
        require_once './includes/conexion.php';
    
    $titulo = isset($_POST['titulo'])? mysqli_real_escape_string($db,$_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion'])? mysqli_real_escape_string($db,$_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria'])? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];

    //validacion
    $errores = array();
    if (empty($titulo)) {
        $errores['titulo'] = "el titulo no es valido";
    }
    if (empty($descripcion)) {
        $errores['descripcion'] = "la descripcion no es valido";
    }
    if (empty($categoria) && !is_numeric($categoria)) {
        $errores['categoria'] = "la categoria no es valida no es valido";
    }

    if (count($errores) == 0) {
        if (isset($_GET['editar'])) {
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];
            $sql = "UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', categoria_id=$categoria ".
            "WHERE id =".$_GET['editar']. " AND usuario_id =".$usuario;
        }else {
            $sql = "INSERT INTO entradas VALUES(null,$usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        }
        $guardar = mysqli_query($db, $sql);
    header('Location: ./vistas/index.php');
    }else {
        $_SESSION['errores_entrada'] = $errores;
        if (isset($_GET['editar'])) {
            header('Location: ./vistas/editar-entrada.php?id='.$_GET['editar']);
        }else {
            header('Location: ./vistas/crear-entradas.php');
        }
    }
}


?>

