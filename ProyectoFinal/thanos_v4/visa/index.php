<?php

include 'models/enlaces.php';
include 'models/ingreso.php';
include 'models/compra.php';
include 'models/visa.php';
include 'models/pago.php';

include 'controllers/template.php';
include 'controllers/enlaces.php';
include 'controllers/ingreso.php';
include 'controllers/compra.php';
include 'controllers/visa.php';
include 'controllers/pago.php';


$template = new Template();
$template -> getTemplate();
