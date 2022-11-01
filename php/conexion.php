<?php

function conectar ()
{
    $servidor = 'localhost';
    $usuario = 'root';
    $contraseña = '';
    $nombre_db = 'labo2';
    $conexion = mysqli_connect($servidor,$usuario,$contraseña,$nombre_db);

    if ($conexion) {
        return($conexion);
    } else {
        echo '<h2> Conexion Fallida </h2>';
    }
}

function desconectar ($conexion)
{   
    if ($conexion) {
        $desconexion = mysqli_close($conexion);
        if (!$desconexion) {
            echo '<h2> Desconexion Fallida </h2>';
        }
    } else {
        echo '<h2> No se ha encontrado una conexion </h2>';
    }

}
?>