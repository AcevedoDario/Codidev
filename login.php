
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>CodiDev</title>
    <link rel="icon" href="./img/logo-favicon.ico">
    <!-- Bootstrap y CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="./css/estilos.css" rel="stylesheet">
  </head>
  
  <body>    
    <!--############### Comienzo del MAIN #################-->

<?php

session_start();
include("connect_db.php");

if (isset($_POST['login'])) {
  $mail = ($_POST['mail']);
  $pass = ($_POST['password']);

  if (empty($mail) || empty($pass)) {
    ?>
      <div class="alert alert-warning text-center" role="alert">
        <strong>ERROR!</strong> Todos los campos deben rellenarse.
      </div>
    <?php
  }else{
    if (!empty($mail)){

      $dominio = ltrim(stristr($mail, '@'), '@') . '.';
      $usuario = stristr($mail, '@', TRUE);

      if (!empty($usuario) && !empty($dominio)){
        if (strlen($pass) >= 8 && strlen($pass) <= 16){
          $query = mysqli_query($conexion,"SELECT * FROM usuario WHERE mail = '$mail' AND password = '$pass'");
          $existe = mysqli_num_rows($query);          
          echo $existe;
          /*$statement = $conexion->prepare('SELECT * FROM usuario WHERE mail = ? AND password = ?');
          $statement->bind_param('ss', $_POST['mail'], $_POST['password']);
          $statement->execute();
          $resultado = $statement->fetch();*/
          if ($existe == 1) {

            $data = mysqli_fetch_assoc($query);
            
            $_SESSION['usuario'] = $data["id_user"];
            header('Location: ./index.php');
          }else{
            ?>
            <div class="alert alert-warning text-center" role="alert">
              <strong>Oh no!</strong> El mail o la contraseña es inválido.
            </div>
            <?php
          }
        }else{
          ?>
          <div class="alert alert-warning text-center" role="alert">
            <strong>ERROR!</strong> Las contraseñas deben contener entre 8 y 16 caracteres.
          </div>
          <?php
        }
      }else{
        ?>
        <div class="alert alert-warning text-center" role="alert">
          <strong>ERROR!</strong> El correo ingresado es inválido.
        </div>
        <?php
      }
    }    
  }
}
?>

    <main role="main" style="margin-bottom: 35px;">
    <div class="container catalogo lead">
    <div class="row justify-content-center">
    <div class="col-4">
    <!--VENTANA DE LOGUEO-->
        <div class="card" style="border-color: black;margin-top:28px;">
            <img class="card-img-top" style="padding: 20px 20px 20px 20px;background-color: #343a40;" src="./img/logo2.png" alt="Card image cap">
            <div class="card-body" style="color:white;background-color:#343a40;opacity:0.8;">
                <h4 class="card-title text-center">INICIA SESION</h4>
                <form name="login" action="login.php" method="post" onsubmit="return validar_login()">
              
                  <div class="form-group">
              
                    <label for="formGroupExampleInput">Correo Electrónico</label>
                    <input name="mail" type="text" class="form-control" id="emailcreado" placeholder="Ingrese correo electrónico">
                  
                  </div>
                  
                  <div class="form-group">
                      
                    <label for="formGroupExampleInput2">Contraseña</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Ingrese contraseña">
                  
                  </div>
                
                  <div class="col-12 pr-0">
                    
                    <span>No tiene cuenta?  |</span>
                    <a class="btn btn-link" href="./registrar.php" type="button">Registrese aquí</a>
          
                  </div>
                
                  <div class="modal-footer">
                    
                  <a class="btn btn-secondary" href="./index.php" type="button">Cancelar</a>
                    <button name="login" type="submit" class="btn btn-primary">Aceptar</button>
                
                </form>
            </div>
        </div>
    <!-- FIN VENTANA DE REGISTRO-->
    </div> <!--FIN COL-->
    </div> <!--FIN ROW-->
    </div> <!--FIN CONTAINER-->
      <!--############### Fin de contenido #################-->

    </main>
  
    <!--############### Fin del MAIN #################-->
  
    
    <!--############### FIN COPYRIGHT #################-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  
  </body>

</html>
