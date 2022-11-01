<?php
    $ruta = '../css';
    require_once("../html/header.html");
    require_once("conexion.php");
?>

<main>
    <section>
        <article>
            <section class="menu_tmp">
                <a class="enlace_boton" href="usuario_alta.php">Alta usuario</a>
            </section>
            <table>
                <caption>Listado de usuarios</caption>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Usuario</th>
                        <th>Tipo</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conexion = conectar();
                        $consulta = 'SELECT id_usuario, usuario, tipo, foto FROM usuario';
                        $query = mysqli_query($conexion, $consulta);
                        $numFilas = mysqli_num_rows($query);
                        if ($numFilas > 0) {
                            while($fila = mysqli_fetch_array($query)){
                                echo '<tr>';
                                if ($fila['foto'] != '') {
                                    echo '<td><img src="../img/usuarios/' . $fila['foto'] . '"></td>';
                                } else {
                                    echo '<td><img src="../img/usuarios/usuario_default.png"></td>';
                                }
                                echo '<td>' . $fila['usuario'] . '</td>';
                                echo '<td>' . $fila['tipo'] . '</td>';
                                echo '<td>';
                                echo '<a href="modificar.php?id='. $fila['id_usuario']. '"><img src="../img/modificar.png"></a>';
                                echo '</td>';
                                echo '<td>';
                                echo '<a href="confirmar.php?id='. $fila['id_usuario']. '"><img src="../img/eliminar.png"></a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            
                        }
                        desconectar($conexion);
                    ?>
                </tbody>
            </table>
        </article>
    </section>
</main>

<?php
    require_once("../html/footer.html");
?>