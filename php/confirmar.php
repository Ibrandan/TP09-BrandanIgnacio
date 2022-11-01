<?php
    $ruta = '../css';
    require_once('../html/header.html');
    require_once('conexion.php');

    $conexion = conectar();
    if($conexion && !empty($_GET['id'])) {
        $id = $_GET['id'];
    
        echo "<main><section><article>";
        echo '<section id="borrar">';

        echo '<h1>Eliminar usuario</h1>';
        $consulta = 'SELECT * FROM usuario WHERE id_usuario= \''.$id . '\'';
        $query = mysqli_query($conexion, $consulta);
        desconectar($conexion);
        $resultado = mysqli_num_rows($query);
        if ($resultado > 0) {
            $fila = mysqli_fetch_array($query);
            echo '<p> Esta seguro de eliminar al usuario <strong>'.$fila['usuario'].'</strong>?</p>';
        }        
        echo '<section class="botones">';
        echo '<a href="borrar.php?id='.$id.'">Aceptar</a>';
        echo '<a href="usuario_listado.php">Cancelar</a>';
        echo '</section>';
        echo '</section>';
        echo "</article></section></main>";
    
    }
?>

<?php
    require_once('../html/footer.html');
?>