<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$basededatos = "proyecto_php";
$db =mysqli_connect($servidor,$usuario,$password,$basededatos);

mysqli_query($db,"SET NAMES 'utf8'");

//iniciar la sesion
if (!isset($_SESSION)) {
    session_start();
}




?>