<?php
$ruta = '../css';
require_once('../html/header.html');

if (!empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['tipo']) && !empty($_FILES['foto']['size'])) {
    require_once('conexion.php');
    $conexion = conectar();
    echo '<h2> hola mundo <h2>';
    if ($conexion) {
        $user = trim($_POST['usuario']);
        $pass = sha1($_POST['pass']);
        $tipo = $_POST['tipo'];
        $nombreFoto = $_FILES['foto']['name'];
        $ext = explode('.',$nombreFoto);
        $origen = $_FILES['foto']['tmp_name'];
        $nuevoNombre = $user . '.' . $ext[1];
        $destino = '../img/usuarios/' . $nuevoNombre;
        $consulta = 'INSERT INTO usuario(usuario,pass,tipo,foto) VALUES (\''. $user . '\', \''. $pass. '\', \''. $tipo . '\',\''. $nuevoNombre . '\')';
        $query = mysqli_query($conexion, $consulta);
        if ($query) {
            $envio = move_uploaded_file($origen, $destino);
            if ($envio){
                echo '<h2> Carga realizada con exito </h2>';
                header("refresh:1;url=../index.php");
            } 
        } else {
            echo '<h2> Carga en base fallida </h2>';
        }
        desconectar($conexion);
    }
} else {
    echo '<p> Faltan datos </p>';
}

require_once('../html/footer.html');
?>