<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Proceso de Compra</title>

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

<body class="bg-light">

     <div class="container">
      <div class="py-3 text-center">
        <h2>Proceso de compra</h2>
        
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Tu carrito</span>
            <span class="badge badge-secondary badge-pill">1</span>
          </h4>
          <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">Paquete de</h6>
                        <small class="text-muted">Publicidad</small>
                      </div>
                      <span class="text-muted">Precio en soles</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">IGV </h6>
                        <small class="text-muted"></small>
                      </div>
                      <span class="text-muted">18%</span>
                    </li>
                    
                    <li class="text-success list-group-item d-flex justify-content-between">
                      <span>Forma de pago</span>
                      <strong>VISA</strong>
                    </li>
                  </ul>

          <form class="card p-2" action="" method="post">
            <div class="input-group">
              <input type="text" class="form-control" id="promocion" name="promocion" placeholder="Código Promoción">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Aplicar</button>
              </div>
            </div>
            <?php 
                
                if (isset($_POST["promocion"])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Código no válido<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>';
                }
                
            ?>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Datos para el pago</h4>
          <form class="needs-validation" method="post" action="">
          <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="razon">RazonSocial</label>
                        <input type="text" class="form-control" id="razonsocial" name="razonsocial" placeholder="" required>
                        <div class="invalid-feedback">
                          Ingrese el campo obligatorio.
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="ruc">RUC</label>
                        <input type="text" class="form-control" id="ruc"name="ruc" placeholder="" required>
                        <div class="invalid-feedback">
                          Ingrese el campo obligatorio.
                        </div>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="email">Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">@</span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                        <div class="invalid-feedback" style="width: 100%;">
                          Ingrese el campo obligatorio.
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        
                      <div class="col-md-6 mb-3">
                      <label for="exampleFormControlSelect1">Paquete Publicitario</label>
                      <select class="form-control" id="paquete" name="total">
                        <option value="">Elegir paquete publicitario</option>
                        <option value="90.00">Semanal s/ 90.00</option>
                        <option value="170.00">Quincenal s/ 170.00</option>
                        <option value="300.00">Mensual s/ 300.00</option>
                      </select>
                      <div class="invalid-feedback">
                        Ingrese el campo obligatorio.
                      </div>
                      </div>
                      
                      <div class="col-md-6 mb-3">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder=""  required>
                        <div class="invalid-feedback">
                          Ingrese el campo obligatorio.
                        </div>
                      </div>

                    </div>

            
                  <?php
            
                        $compra = new Compra();
                        $compra -> compraController();
                  ?>
            
            
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="terminos" name="terminos" value="acepta">
              <label class="custom-control-label" for="terminos">Acepto los terminos y condiciones</label>
            </div>
            <hr class="mb-4">
            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Confirmar Datos de la compra">

                    
          </form>
          <a href="salir" role="button" class="my-4 btn btn-danger btn-lg btn-block">Cerrar Sesion</a>
        </div>
      </div>

      <footer class="my-4 pt-5 text-muted text-center text-small mb-2">
        <p class="mb-1">&copy; 2019 - Compra 100% seguro</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="https://worldxchange.com.pe/politica/">Privacidad</a></li>
          <li class="list-inline-item"><a href="https://worldxchange.com.pe/politica/">Terminos y condiciones</a></li>
          <li class="list-inline-item"><a href="https://worldxchange.com.pe/#contacto">Soporte</a></li>
        </ul>
      </footer>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="views/js/jquery-3.4.1.min.js"></script>
    <script src="views/js/popper.min.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
    <script src="views/js/main.js"></script>
</body>

</html>

<?php
ob_end_flush();
?>