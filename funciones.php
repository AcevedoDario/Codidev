<?php

    function listarLibros($conexion) {

        $query = mysqli_query($conexion,"SELECT * FROM libro");

        ?>
 
        <div class="row my-5">

        <?php

        $contadorRegistros=0;

        while ($data = mysqli_fetch_assoc($query)) {

            ?>

            <div class="col-lg-4">
                        
                <img src="<?php echo $data["logo"]; ?>" width="140" height="140">
                <h2><?php echo $data["nombre_libro"]; ?></h2>
                <p><?php echo utf8_encode($data["descripcion"]); ?></p>
                        
                <?php

                    if (isset($_SESSION['usuario'])){
            
                ?>
                    
                    <a class="btn btn-dark" href="./procesarLibro.php?uid=<?php echo $_SESSION['usuario']; ?>&lid=<?php echo $data["id_libro"]; ?>&mode=add" type="button">Añadir libro</a>
                        <?php
                    }else{
                        ?>
                        <div class="row justify-content-center">
                   >
                    <a class="btn btn-dark" href="./login.php" type="button">Leer libro</a>
                       
                        </div>
                        <?php
                    }
                    ?>

                </div>

            <?php

            $contadorRegistros++; 

            if ($contadorRegistros%3==0) {
                ?>

                </div><div class="row my-5">

                <?php
            }

        }

        ?>

        </div>

        <?php

    }

    function librosCurso($conexion,$id_usuario) {

        $query = mysqli_query($conexion,"SELECT * FROM vw_usuarios_libros WHERE id_usuario = $id_usuario AND finalizado = 0");

        $existe = mysqli_num_rows($query); // VERIFICO SI HAY LIBROS ASIGNADOS

        if ($existe == 0) {

            ?>

            <h2>Aún no tienes libros en curso</h2>

            <?php

        }else{

        ?>

            <h2>Libros en Curso</h2>

            <table class="table table-hover">
                
                <tr class="active bg-dark text-white text-center">

                    <th class="active text-center" style="width: 60px; pading: 12px 6px 12px 6px;"># ID</th>
                    <th>Libro</th>
                    <th>Portada</th>
                    <th class="">Acción</th>

                </tr>

            <?php

            while ($data = mysqli_fetch_assoc($query)) {

                ?>

                <tr class="text-center">

                    <td class="active"><?php echo $data["id_libro"]; ?></td>
                    <td><?php echo $data["nombre_libro"]; ?></td>
                    <td><a href="<?php echo $data["path_libro"]; ?>" target="_blank">Visualizar</a></td>
                    <td>
                        <a href="./procesarLibro.php?uid=<?php echo $id_usuario; ?>&lid=<?php echo $data["id_libro"]; ?>&mode=end">Finalizar</a> | 
                        <a href="./procesarLibro.php?uid=<?php echo $id_usuario; ?>&lid=<?php echo $data["id_libro"]; ?>&mode=drop">Eliminar</a>
                    </td>

                </tr>    

                <?php

            }

            ?>

            </table>

        <?php

        }

    }

    function librosFinalizados($conexion,$id_usuario) {

        $query = mysqli_query($conexion,"SELECT * FROM vw_usuarios_libros WHERE id_usuario = $id_usuario AND finalizado = 1");

        $existe = mysqli_num_rows($query); // VERIFICO SI HAY LIBROS ASIGNADOS

        if ($existe == 0) {

            ?>

            <h2>Aún no terminaste ningún libro</h2>

            <?php

        }else{

        ?>

            <h2>Libros Finalizados</h2>

            <table class="table table-hover">
                
                <tr class="active bg-dark text-white text-center">

                    <th class="active text-center" style="width: 60px; pading: 12px 6px 12px 6px;"># ID</th>
                    <th>Libro</th>
                    <th>Acción</th>

                </tr>

            <?php

            while ($data = mysqli_fetch_assoc($query)) {

                ?>

                <tr class="text-center">

                    <td class="active"><?php echo $data["id_libro"]; ?></td>
                    <td><?php echo $data["nombre_libro"]; ?></td>
                    <td><a href="./procesarLibro.php?uid=<?php echo $id_usuario; ?>&lid=<?php echo $data["id_libro"]; ?>&mode=drop">Eliminar</a></td>

                </tr>    

                <?php

            }

            ?>

            </table>

        <?php

        }

    }

?>