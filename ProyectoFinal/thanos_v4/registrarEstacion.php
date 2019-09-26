<?php
session_start();
$nombre=$_SESSION["nombre"];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fuil Finder - Gasolina|Mejor Precio|Perú</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/estilos.css" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="css/all.min.css" />
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="application/javascript" src="js/registrarEstacion.js"></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <a class="navbar-brand" href="#"
          ><img src="img/logo.png" alt="Logo FuilFinder" height="50"
        /></a>
        <button
          class="navbar-toggler text-light"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link text-light" href="#"
                >Inicio <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Como funciona</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="empresa.php"
                >Seccion Empresa</a
              >
            </li>
          </ul>
          <a class="btn btn-primary mr-3" href="registro.html" role="button"
            >Registrarme</a
          >
          <?php
              if (isset($_SESSION['nombre'])){
                echo "<label class='blanco'>Bienvenido:".$nombre."</label></br>[<a href='logout.php'>Cerrar</a>]";
              }else{
                header('Location: empresa.php');
                ?>
                  <a class="btn btn-outline-success" href="ingreso.html" role="button">Inicar Sesion</a>
                <?php
              }
          ?>
        </div>
      </nav>
    </header>
    <div class="container">
      <div class="row">
            <div class="col-12 my-4">
                    <ul class="nav nav-pills nav-fill justify-content-center">
                      <li class="nav-item">
                        <a class="nav-link" href="empresa.php"
                          >Buscar Estaciones</a
                        >
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="registrarEstacion.php"
                          >Registrar Estaciones</a
                        >
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="visa/">Publicidad</a>
                      </li>
                    </ul>
                  </div>
        <div class="col-12 my-4">
                <div class="col-12 d-flex justify-content-center ">
                        <form class="my-4" id="formularioD" name="formularioD"  method="post">
                              <h3 class="text-center mb-4">Registro de estacion</h3>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nombre Estacion</label>
                                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputPassword4">Telefono</label>
                                    <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="">
                                  </div>
                                </div>

                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Dirección</label>
                                    <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="lstProvincias">Distrito</label>
                                    <select class="form-control" id="lstProvincias" name="lstProvincias">
                                      <option value="0">Seleccionar Distrito</option>
                                    </select>
                                  </div>
                                </div>

                                
                                <div class="form-row">
                                        <div class="form-group col-md-2">
                                          <label for="inputEmail4">Gasohol 84</label>
                                          <input type="text" class="form-control" id="g84" name="g84" placeholder="Precio..">
                                        </div>
                                        <div class="form-group col-md-2">
                                          <label for="inputPassword4">Gasohol 90</label>
                                          <input type="text" class="form-control" id="g90" name="g90" placeholder="Precio..">   
                                        </div>
                                        <div class="form-group col-md-2">
                                          <label for="inputPassword4">Gasohol 95</label>
                                          <input type="text" class="form-control" id="g95" name="g95" placeholder="Precio..">
                                        </div>
                                        <div class="form-group col-md-2">
                                          <label for="inputPassword4">Gasohol 97</label>
                                          <input type="text" class="form-control" id="g97" name="g97" placeholder="Precio..">
                                        </div>
                                        <div class="form-group col-md-2">
                                          <label for="inputPassword4">Gasohol 98</label>
                                          <input type="text" class="form-control" id="g98" name="g98" placeholder="Precio..">
                                        </div>
                                        <div class="form-group col-md-2">
                                          <label for="inputPassword4">DB5 S-50</label>
                                          <input type="text" class="form-control" id="s50" name="s50" placeholder="Precio..">
                                        </div>
                                      </div>
                                <input type="hidden" id="txtAction" name="txtAction" >
                                <button  class=" mt-2 btn btn-primary" id="btnRegistrarEst">Registrar</button>
                                <button  class=" mt-2 btn btn-primary" id="btnReset">Reset</button>
                              </form>
                </div>
        </div>
        
      </div>
    </div>

  </body>
</html>
