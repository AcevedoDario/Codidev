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

    <main role="main" style="margin-bottom: 35px;" >
    <div class="container">

<?php
error_reporting(0);
session_start();
include("connect_db.php");

if (isset($_POST['registrar'])) {
    $name = ($_POST['nombre']);
    $mail = ($_POST['mail']);
    $pass = ($_POST['pass']);
    $remail = ($_POST['remail']);
    $repass = ($_POST['repass']);

    if (empty($name) || empty($mail) || empty($remail) || empty($pass) || empty($repass)) {
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

          if (!empty($remail)){
            $dominio = ltrim(stristr($remail, '@'), '@') . '.';
            $usuario = stristr($remail, '@', TRUE);

            if (!empty($usuario) && !empty($dominio)){
              if ($mail == $remail){
                if (strlen($pass) > 8 && strlen($pass) < 16){
                  if (strlen($repass) > 8 && strlen($repass) < 16){
                    if ($pass == $repass){
                      $statement = $conexion->prepare('SELECT * FROM usuario WHERE mail = ?');
                      $statement->bind_param('s', $mail);
                      $statement->execute();
                      $resultado = $statement->fetch();
                      if ($resultado > 0) {
                        ?>
                        <div class="alert alert-warning text-center" role="alert">
                          <strong>Oh no!</strong> El mail ingresado ya posee una cuenta.
                        </div>
                        <?php
                      }else{
                        $query = mysqli_query($conexion,"INSERT INTO usuario (name_user,mail,password) VALUES ('$name','$mail','$pass')");
                        if ($query) {
                          ?>
                          <div class="alert alert-success text-center" role="alert">
                            <strong>Bien hecho!</strong> Se ha registrado correctamente.
                          </div>
                          <?php
                        }else{
                          ?>
                          <div class="alert alert-danger text-center" role="alert">
                            <strong>Oh no!</strong> Ha ocurrido un error, intente nuevamente.
                          </div>
                          <?php
                          }
                        }
                    }else{
                      ?>
                      <div class="alert alert-warning text-center" role="alert">
                        <strong>ERROR!</strong> Las contraseñas no coinciden.
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
                    <strong>ERROR!</strong> Las contraseñas deben contener entre 8 y 16 caracteres.
                  </div>
                  <?php
                }
              }else{
                ?>
                <div class="alert alert-warning text-center" role="alert">
                  <strong>ERROR!</strong> Los correos no coinciden.
                </div>
                <?php
              }        
            }else{
              ?>
              <div class="alert alert-warning text-center" role="alert">
                <strong>ERROR!</strong> Uno de los correos ingresados es inválido.
              </div>
              <?php
            }
          }else{
            ?>
          <div class="alert alert-warning text-center" role="alert">
            <strong>ERROR!</strong> Debe completar todos los campos.
          </div>
          <?php
          }
        }else{
        ?>
        <div class="alert alert-warning text-center" role="alert">
          <strong>ERROR!</strong> Uno de los correos ingresados es inválido.
        </div>
        <?php
        }
      }
    }
  }
?>

    <div class="row justify-content-center">
    <div class="col-4">
    <!--VENTANA DE REGISTRO-->
        <div class="card" style="border-color: black;margin-top:28px;">
            <img class="card-img-top" style="padding: 20px 20px 20px 20px;background-color: #343a40;" src="./img/logo2.png" alt="Card image cap">
            <div class="card-body" style="color:white;background-color:#343a40;opacity:0.8;">
                <h4 class="card-title text-center">Registrate</h4>
                <form name="signup" action="registrar.php" method="post" onsubmit="return validar_signup()">
            
                    <div class="form-group">
                        
                        <label for="formGroupExampleInput">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="nombreusuario" placeholder="Ingrese su nombre">
                    
                    </div>
                    
                    <div class="form-group">
                        
                        <label for="formGroupExampleInput">Correo Electrónico</label>
                        <input name="mail" type="text" class="form-control" id="emailnuevo" placeholder="Ingrese correo electrónico">
                    
                    </div>
                    
                    <div class="form-group">
                        
                        <label for="formGroupExampleInput">Verificar Correo Electrónico</label>
                        <input name="remail" type="text" class="form-control" id="emailnuevoverificado" placeholder="Vuelva a ingresar su correo electrónico">
                    
                    </div>
                    
                    <div class="form-group">
                        
                        <label for="formGroupExampleInput2">Contraseña</label>
                        <input name="pass" type="password" class="form-control" id="password" placeholder="Ingrese una contraseña">
                    
                    </div>
                    
                    <div class="form-group">
                        
                        <label for="formGroupExampleInput2">Verificar Contraseña</label>
                        <input name="repass" type="password" class="form-control" id="passwordverificado" placeholder="Vuelva a ingresar contraseña">
                    
                    </div>
                    
                    <div class="modal-footer">
                        
                        <a class="btn btn-secondary" href="./index.php" type="button">Cancelar</a>
                        <button type="submit" name="registrar" class="btn btn-primary">Registrarse</button>
                    
                    </div>

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  
  </body>

</html>
