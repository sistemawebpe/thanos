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
    <link rel="stylesheet" href="css/estiloLocal.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="application/javascript" src="js/empresa.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
      div#users-contain { width: 350px; margin: 20px 0; }
      div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
      div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
      .ui-dialog .ui-state-error { padding: .3em; }
      .validateTips { border: 1px solid transparent; padding: 0.3em; }
      
    </style>
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
              <a class="nav-link active" href="empresa.php">Buscar Estaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registrarEstacion.php"
                >Registrar Estaciones</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="visa/">Publicidad</a>
            </li>
          </ul>
        </div>
        <div class="col-12 my-4">
          <form
            class="form-inline d-flex justify-content-center align-items-stretch"
          >
            
            <div class="form-group col-md-4">
                    <label for="cmbDistrito" class="mr-2">Distrito</label>
                    <select id="cmbDistrito" class="form-control">
                      <option selected value='0'>Seleccionar...</option>
                      
                    </select>
            </div>
            <div class="form-group mt-3 col-md-6">
                    <label for="inputAddress" class="mr-2">Direccion / Referencia</label>
                    <input type="text" class="form-control col-md-8" id="inputAddress" placeholder="1234 Main St">
            </div>
            <button  class="mt-3 btn btn-primary mb-2" id="btnEnviar" name='btnEnviar'>
              Buscar
            </button>
          </form>

        </div>
        <div class="col-12 my-4">
                <table class="table CabTabla" id="idtabla" name="idtabla">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">g84plus</th>
                            <th scope="col">g90plus</th>
                            <th scope="col">g95plus</th>
                            <th scope="col">g97plus</th>
                            <th scope="col">g98plus</th>
                            <th scope="col">s50_uv</th>
                            <th scope="col">Ver/Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                      
        </div>
      </div>
    </div>
  <!-- dialogos-->

 
  <!-- fin -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar estación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="my-4" id="formularioModal" name="formularioModal"  method="post">
            
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
                  <select class="form-control" id="lstProvinciasModal" name="lstProvinciasModal">
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
                        <input type="text" class="form-control" id="g90" name="g90" placeholder="Precio.." required pattern="^[0-9]{2}\.[0-9]{0,4}$" >   
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputPassword4">Gasohol 95</label>
                        <input type="text" class="form-control" id="g95" name="g95" placeholder="Precio.." required pattern="^[0-9]{2}\.[0-9]{0,4}$" >
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputPassword4">Gasohol 97</label>
                        <input type="text" class="form-control" id="g97" name="g97" placeholder="Precio.." required pattern="^[0-9]{2}\.[0-9]{0,4}$" >
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputPassword4">Gasohol 98</label>
                        <input type="text" class="form-control" id="g98" name="g98" placeholder="Precio.." required pattern="^[0-9]{2}\.[0-9]{0,4}$" >
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputPassword4">DB5 S-50</label>
                        <input type="text" class="form-control" id="s50" name="s50" placeholder="Precio.." required pattern="^[0-9]{2}\.[0-9]{0,4}$" >
                      </div>
                    </div>
              <input type="hidden" id="txtAction" name="txtAction" >
              <input type="hidden" id="txtidEstacion" name="txtidEstacion" >
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" id='btnEliminarModal' name='btnEliminarModal'>Eliminar</button>
                <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal" id="btnCerrarModal" name="btnCerrarModal">Close</button>
                <button type="button" class="btn btn-primary pull-right" id='btnGrabarModal' name='btnGrabarModal'>Actualizar</button>
              </div>
      </div>  
    </div>
  </div>
</div>
  </body>
</html>
