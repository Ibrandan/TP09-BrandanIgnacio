<?php
    $ruta = '../css';
    require_once('../html/header.html');
    require_once('conexion.php');

    $conexion = conectar();
    if($conexion && !empty($_GET['id'])) {
        $id = $_GET['id'];
        echo "<main><section><article>";
        $consulta = 'SELECT * FROM usuario WHERE id_usuario= \''.$id . '\'';
        $query = mysqli_query($conexion, $consulta);
        desconectar($conexion);
        if(mysqli_num_rows($query) > 0) {
            $fila = mysqli_fetch_array($query);
?>
        <form action="usuario_alta_ok.php" method="post" enctype="multipart/form-data">
            <legend>Datos del usuario</legend>     
            <section>
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" value="<?php echo $fila['usuario'];?>" required maxlength="45">

                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo">
                <option value="Administrador">Administrador</option>
                <option value="Común">Común</option>
                </select>
                <label for="foto">Nueva Foto</label>
                <input type="file" name="foto" id="foto" accept="image/*">
                <label for="pass">Nueva Contraseña</label>
                <input type="password" name="pass" id="pass" placeholder="Ingrese nueva contraseña" required maxlength="45">
                <input type="hidden" value="<?php echo $fila['id_usuario'];?>" name="id">
                <section id="boton">
                    <input type="submit" name="enviar" value="Actualizar">
                </section>
            </section>
        </form>
        <section>
            <a href="usuario_listado.php" class="enlace_boton">Cancelar</a>
        </section>
<?php
        }
    }  else {
        echo '<h1> No se pudo realizar la modificaciòn </h1';
        header('refresh:1;url=usuario_listado.php');
    }
    echo "</article></section></main>";
    require_once('../html/footer.html');
?>