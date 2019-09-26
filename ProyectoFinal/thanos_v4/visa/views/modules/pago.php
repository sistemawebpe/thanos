
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Resumen de Compra World Xchange</title>

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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center my-4">
                
                <img src="views/img/visa.png" alt="Logo Visanet">
            </div>
            <div class="col-md-8">
                <div class="card">
                  <div class="card-header text-center">
                    Compra
                  </div>
                  <div class="card-body">
                    <?php 
                        $pago = new PagoController();
                        $pago -> processPagoVisa();
                     ?>
                  </div>
                  <div class="card-footer text-muted text-center">
                    Gracias por su preferencia
                  </div>
                </div>
                <p class=" mt-3 text-muted text-center">Por su seguridad cierre la ventana luego de verificar su pago</p>
                
            </div>
            

        </div>
           <footer class="my-2 pt-5 text-muted text-center text-small mb-2">
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
