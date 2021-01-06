<?php session_start();?>

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

    <main role="main" id="principal">
      
      <div class="modal iniciarsesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          
        <div class="modal-dialog" role="document">
          
          <div class="modal-content">
            
            <div class="modal-header">
              
              <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            
            </div>
            
            <!------------------INICIO DE FORMULARIO DE LOG-IN-->
            
            <div class="modal-body">
            
              <form name="login" action="login.php" method="post" onsubmit="return validar_login()">
            
                <div class="form-group">
            
                  <label for="formGroupExampleInput">Correo Electrónico</label>
                  <input name="mail" type="text" class="form-control" id="emailcreado" placeholder="Ingrese correo electrónico">
                
                </div>
                
                <div class="form-group">
                    
                  <label for="formGroupExampleInput2">Contraseña</label>
                  <input name="password" type="password" class="form-control" id="password" placeholder="Ingrese contraseña">
                
                </div>
              
                <div class="col-12">
                  
                  <span>No tiene cuenta?  |</span>
                  <button type="button" class="btn btn-link" data-toggle="modal" data-target=".registrarse">Registrese aquí</button>
        
                </div>
              
                <div class="modal-footer">
                  
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button name="login" type="submit" class="btn btn-primary">Aceptar</button>
              
              </form>
              
            </div>
            
          </div>
          
        </div>
        
      </div>
    
    </div>

  <!--MODAL DE REGISTRO-->
  
    <div class="modal registrarse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      
      <div class="modal-dialog" role="document">
        
        <div class="modal-content">
          
          <div class="modal-header">
            
            <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          
          </div>
          
          <!-- INICIO DE FORMULARIO DE REGISTRO-->
          
          <div class="modal-body">
            
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
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="registrar" class="btn btn-primary">Registrarse</button>
              
              </div>
              
              <!--- FIN DE FORMULARIO DE REGISTRO--->
            
            </form> 
           
          </div>
        
        </div>
      
      </div>
    
    </div>
      
      <!--############### Comienzo del Carrousel #################-->

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        
        <ol class="carousel-indicators">
          
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        
        </ol>
        <div class="carousel-inner">
          
          <!--############### Slider 1 #################-->

          <div class="carousel-item active">
            
            <img src="./img/AdobeStock_126016889apaisado.jpg" alt="" class="bd-placeholder-img" width="100%" height="100%">
            
            <div class="container">
              
              <div class="carousel-caption text-left sombra">
                
                <h1 class="lead display-4 font-weight-bold">La plataforma <br>de aprendizaje <br>para desarrolladores</h1>
                <p><br><br><a class="btn btn-lg btn-primary" href="./registrar.php" type="button">CREA UNA CUENTA GRATIS</a></p>
                <br>
                <p class="lead font-weight-normal">Aprende desarrollo web con HTML5, CSS y JavaScript. Backend con Python. React, Go, Laravel. Desarrollo móvil con Android, Flutter y mucho más. Desde tu casa.</p>
                
              </div>
            
            </div>
          
          </div>
          
          <!--############### Slider 2 #################-->
          
          <div class="carousel-item">
            
            <img src="./img/slider2.jpg" alt="" class="bd-placeholder-img" width="100%" height="100%">
            
            <div class="container">
              
              <div class="carousel-caption sombra">
                
                <h1 class="lead display-4 font-weight-bold">Maneja tu tiempo</h1>
                <p>Acceso 24 horas al día para que aprendas a tu propio ritmo y en español.</p>
                <p><a class="btn btn-lg btn-primary" href="./libros.php" role="button">Elige un libro</a></p>
              
              </div>
            
            </div>
          
          </div>
          
          <!--############### Slider 3 #################-->
          
          <div class="carousel-item">
            
            <img src="./img/slider3.jpg" alt="" class="bd-placeholder-img">
            
            <div class="container">
              
              <div class="carousel-caption text-right sombra">
                
                <h1 class="lead font-weight-bold" style="font-size: 30px;">¡Aprender a programar páginas web nunca fue tan fácil!</h1>
                <p>Domina los lenguajes de código, herramientas, arquitectura, bases de datos y más.</p>
              
              </div>
            
            </div>
          
          </div>
        
        </div>
        
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
      
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      
      </div>

      <!--############### Fin de Carrousel #################-->

      <!-- ================================================== -->

      <!--############### Comienzo de contenido #################-->
    
      <div class="clearfix-padding-top"></div>
    
      <div class="container catalogo">
    
        <div class="row featurette">
          
          <div class="col-md-7">
            
            <h2 class="featurette-heading font-weight-bold">Bienvenido a la CodiDev <br> Aprende a Programar</h2>
            <br>
            <p class="lead">La programación ha pasado de ser una actividad de unos pocos a popularizase. Ahora es común ver en muchas escuelas que se imparte la programación como una nueva materia. La programación es una disciplina maravillosa que nos permite crear aplicaciones para que una computadora, celular, tablet, reloj etc. haga lo que uno quiera.</p>
          
          </div>
          
          <div class="col-md-5">
            
            <img src="./img/quienes.jpg" alt="" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500">
            
          </div>
        
        </div>
      
      </div>
  
      <br>
      <hr>
      <br>

      <div class="container text-center">
        
        <div class="row">
          
          <div class="col-lg-4">
            
            <img src="./img/aprende1.svg" alt="" width="200" height="200">
            <h3>Aprende desde 0</h3>
            <br>
            <p class="lead">Programar no tiene que ser tan dificil. Aprende los fundamentos desde cero y obtén una base sólida.</p>
          
          </div> 
          
          <div class="col-lg-4">
            
            <img src="./img/aprende2.svg" alt="" width="200" height="200">
            <h3>Estudia a tu ritmo y profundiza</h3>
            <br>
            <p class="lead">Contamos con más de 800 horas de contenido para que aprendas más allá de lo básico. Libros con temas teóricos y prácticos con proyectos.</p>
          
          </div>
          
          <div class="col-lg-4">
            
            <img src="./img/aprende3.svg" alt="" width="200" height="200">
            <h3>Prepárate para el futuro</h3>
            <br>
            <p class="lead">Consigue las habilidades que tu carrera profesional necesita.</p>
          
          </div>
        
        </div>    
      
      </div>

      <br>
      <hr>
      <br>
    
      <div class="container catalogo">
        
        <div class="row featurette">
          
          <div class="col-md-7  align-self-center">
            
            <p class="lead">Hay muchos lenguajes de programación que podemos utilizar para aprender.</p>
            <p class="lead">Este sitio tratará de mostrarte un sendero a seguir para llegar a la meta, pero por sobre todas las cosas te lentaremos a que disfrutes con cada programa que desarrolles</p>
          
          </div>
          
          <div class="col-md-5">
            
            <img src="./img/img3.jpg" alt="" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500">
            
          </div>
        
        </div>
      
      </div>
      
      <!--############### Fin de contenido #################-->

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
