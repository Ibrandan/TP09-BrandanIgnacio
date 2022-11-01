<?php
$ruta = '../css';
require_once('../html/header.html');

if (!empty($_POST['usuario']) && !empty($_POST['pass'])) {
    require_once('conexion.php');
    $conexion = conectar();
    if ($conexion) {
        $user = trim($_POST['usuario']);
        $pass = sha1($_POST['pass']);
        $consulta = 'SELECT * FROM usuario WHERE usuario = \''. $user . '\' AND pass = \''. $pass. '\'';
        $query = mysqli_query($conexion, $consulta);
        $numFilas = mysqli_num_rows($query);
        if ($numFilas > 0) {
            header("refresh:0;url=usuario_listado.php");
        } else {
            echo '<p> Usuario y clave incorrectos </p>';
            header("refresh:2;url=../index.php");
        }
        desconectar($conexion);
    }
} else {
    echo '<p> Faltan datos </p>';
}

require_once('../html/footer.html');
?>