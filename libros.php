<?php
session_start();
include("./connect_db.php");
include("./funciones.php");
?>
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
    
    <!--############### Comienzo de Header #################-->

    <header>
      
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
            <div class="col-sm-12 col-md-12 col-lg-4 text-center align-self-center p-1">
              <a href="./index.php"><img src="./img/logo2.png" alt=""></a>
            </div>
            <button class="navbar-toggler col-sm-12 col-md-12 col-lg-4 text-center align-self-center p-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-sm-12 col-md-12 col-lg-4 text-center align-self-center p-1">
              <ul class="navbar-nav collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <li>
                  <a class="nav-link" href="./index.php" style="font-size: 15px;">Home <span class="sr-only">(current)</span></a>
                </li>
                <li>
                  <a class="nav-link" href="./libros.php" style="font-size: 15px;">Libros</a>
                </li>
                <?php
                if (isset($_SESSION['usuario'])){
                  ?>
                <li>
                  <a class="nav-link" href="./mislibros.php" style="font-size: 15px;">Mis Libros</a>
                </li>
                </ul>
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-4 text-center align-self-center p-1">
                    <form class="form-inline justify-content-center">
                    <a class="btn btn-primary" href="./logout.php" type="button">Cerrar Sesión</a>
                    </form>
                  </div>
                <?php
                }else{
                ?>
                  </ul>
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-4 text-center align-self-center p-1">
                    <form class="form-inline justify-content-center">
                    <a class="btn btn-primary" href="./login.php" type="button">Ingresar</a>
                    </form>
                  </div>
                <?php
                }
                ?>                
        </div>
      </nav>
    
    </header>

    <!--############### Fin de Header #################-->

    <!--############### Comienzo del MAIN #################-->
    
    <main role="main">
    
      <div style="padding-top: 50px;">
    <!---------------------------------------------CONTENEDORES DE LIBROS (PRIMER fILA)---------------------------------------------->

      <div class="container catalogo lead" style="margin-top: 60px">
        
        <?php listarLibros($conexion); ?>

      </div><!-- /.container -->

    </main>

    <!--############### Fin del MAIN #################-->
  
    <div class="clearfix-padding-bottom"></div>
  
    <!--############### Comienzo del FOOTER #################-->
    
    <footer>
      
      <div class="container">
        
        <div class="row justify-content-center">
        
          <div class="col-sm-12 col-md-6 col-lg-4 text-center align-self-center p-3">
            
            <a href="./index.php"><img src="./img/logo2.png" alt=""></a>
            
          </div>
          
          <div class="col-sm-12 col-md-6 col-lg-4 text-monospace text-center align-self-center p-3">
            
            <h4>Recursos sobre:</h4>
            
            <ul class="list-inline">
              
              <li>Front-end</li>
              <li>Back-end</li>
            
            </ul>

          </div>
          
          <div class="col-sm-12 col-md-12 col-lg-4 text-center text-monospace align-self-center p-3">
            
            <h4>CodiDev</h4>
            
            <ul class="list-inline">
              
              <li>Politicas de privacidad</li>
              <li>Terminos y condiciones</li>
            
            </ul>
          
          </div>
        
        </div>
        
      </div>
      
    </footer>
  
    <!--############### Fin del FOOTER #################-->

    <!--############### COPYRIGHT #################-->

    <div class="container" id="copyright">
      
      <div class="row align-items-center pt-3" style="height: 70px;">
        
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        
          <p class="font-weight-light">© 2020
            <a href="./index.php">CodiDev</a>. All rights reserved.
          </p>
        
        </div>
      
      </div>

    </div>
  
    <!--############### FIN COPYRIGHT #################-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  
  </body>

</html>