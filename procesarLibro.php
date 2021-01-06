<?php

session_start();
include("./connect_db.php");
include("./funciones.php");

if (
    (isset($_GET["uid"])) && (isset($_GET["lid"])) && (isset($_GET["mode"]))
) {

    $id_usuario = $_GET["uid"];
    $id_libro = $_GET["lid"];
    $mode = $_GET["mode"];
    
    if ($_SESSION["usuario"] == $id_usuario) { 
        
        // PREVIENE QUE SE MANDE OTRO ID USUARIO POR LA QUERY Y SE PUEDAN ALTERAR RELACIONES EXTERNAS 
        // AL PROPIO USUARIO, SI EL ID QUE INGRESA X LA QUERY ES = AL DE LA SESSION CORROBORAMOS QUE ESTAMOS 
        // OPERANDO SOBRE EL USUARIO ACTUAL

        switch($mode) {
            case "add":
            $query_string = "DELETE FROM usuarios_libros WHERE id_usuario = $id_usuario AND id_libro = $id_libro; INSERT INTO usuarios_libros VALUES (" . $id_libro . "," . $id_usuario . ",0);";
            break;
            case "drop":
            $query_string = "DELETE FROM usuarios_libros WHERE id_usuario = $id_usuario AND id_libro = $id_libro;";
            break;
            case "end":
            $query_string = "UPDATE usuarios_libros SET finalizado = 1 WHERE id_usuario = $id_usuario AND id_libro = $id_libro;";
            break;
        }
        
        if (mysqli_multi_query($conexion,$query_string)) {
            header("location:misLibros.php");
        }else{
            echo "<p>" . $query_string . "</p>";
            echo "<p>" . mysqli_error($conexion) . "</p>";
        }

        

    }

}

?>