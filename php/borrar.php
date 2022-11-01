<?php
    $ruta = '../css';
    require_once('../html/header.html');
    require_once('conexion.php');

    $conexion = conectar();
    if ($conexion && !empty($_GET['id'])) {
        $id = $_GET['id'];
        echo "<main><section><article>";
        $consulta = 'DELETE FROM usuario WHERE id_usuario= \''.$id . '\'';
        $query = mysqli_query($conexion, $consulta);
        desconectar($conexion);
        if($query) {
            echo '<h1>Se ha borrado con exito</h1>';
            header('refresh:1;url=usuario_listado.php');
        } else {
            echo '<h1>Ha ocurrido un error</h1>';
        }
        echo "</article></section></main>";
    } else {
        echo '<h1>Ha ocurrido un error</h1>';
    }
?>
<?php
    require_once('../html/footer.html');
?>