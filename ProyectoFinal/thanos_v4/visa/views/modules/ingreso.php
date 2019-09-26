<?php
    session_start();
    if(isset($_SESSION["validar"])){
        if($_SESSION["validar"]){
            header('Location: inicio');
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login Fuil Finder</title>

    <link rel="shortcut icon" href="views/img/icono.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="views/css/bootstrap.min.css">
    <!-- Link to your css file -->
    <link rel="stylesheet" href="views/css/estilos.css">
    <!-- Link to your FontAwesome files -->
    <link rel="stylesheet" href="views/css/all.min.css">
    <!-- Link to your Google Fonts files -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:300,400,500&display=swap" rel="stylesheet">

</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
              <form class="form-signin" action="" method="POST">
                  <div class="text-center mb-4 mt-2">
                    <img class="mb-4" src="views/img/logo.png" alt="" width="200" height="80">
                    <h1 class="h3 mb-3 font-weight-normal">Fuild Finder</h1>
                    <p>Para inicar sesion debe estar previamente registrado como empresa en nuestro sistema</p>
                  </div>

                  <div class="form-label-group">
                    <input type="email" id="reserva" name="reserva" class="form-control" placeholder="Reserva" required autofocus>
                    <label for="reserva">Ingrese su email..</label>
                  </div>

                  <div class="form-label-group">
                    <input type="password" id="documento" name="documento" class="form-control" placeholder="Documento" required>
                    <label for="documento">Ingrese su contraseña</label>
                  </div>

                  <div class="checkbox mb-3">
                    <label>
                      <input type="checkbox" value="remember-me"> Recuerdame
                    </label>
                  </div><?php $login = new Ingreso(); $login->loginController();?>
                  <input class="btn btn-lg btn-primary btn-block" type="submit" value="Iniciar Sesion">
                  <p class="mt-5 mb-2 text-muted text-center">&copy; 2019</p>
                </form>  
        </div>
        
    </div>
</div>
    

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="views/js/jquery-3.4.1.min.js"></script>
    <script src="views/js/popper.min.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
    <script src="views/js/main.js"></script>
</body>

</html>
