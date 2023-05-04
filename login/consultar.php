<?php
session_start();
include('conexion_bd.php');

if (!empty($_POST['ingresar'])) {
    if (empty($_POST['usuario']) && empty($_POST['password'])) {
        echo '<div>LOS CAMPOS ESTÁN VACIOS</div>'; //se puede usar bootstrap para hacerlo bonito?
    } else {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $consulta = $conexion->query("SELECT * FROM clientes WHERE username='$usuario' AND password='$password'");
        if ($datos = $consulta->fetch_object()) {  //si $datos existe, existe el usuario también
            header("location: ../indexBoostrap.html");
        } else {
            echo '<div style="color: red;">ACCESO DENEGADO</div>';
        }
    }
}

if (!empty($_POST['enter'])) {
    if (empty($_POST['usuario']) && empty($_POST['password'])) {
        echo '<div>THE FIELDS ARE EMPTY</div>'; //se puede usar bootstrap para hacerlo bonito?
    } else {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $consulta = $conexion->query("SELECT * FROM clientes WHERE username='$usuario' and password='$password'");
        if ($datos = $consulta->fetch_object()) {  //si $datos existe, existe el usuario también
            header("location: ../indexEnglishBootstrap.html");
        } else {
            echo '<div>ACCESS DENIED</div>';
        }
    }
}

if (!empty($_POST['registrar'])) {
    header("location: registrar.php");
}


