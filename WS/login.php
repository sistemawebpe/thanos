<html>
<head>
<head>
    <title>Login - Fuel Finder</title>
    <script type="application/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/estilos.css" />
    <script type="application/javascript" src="js/login.js"></script>
</head>
<body>

<?php include_once("nav_menu.php"); ?>
<div class="presentBody">
    <div class="contenedorRegistrar">
        <div><a href="#" id="regUsuario">Registrar Usuario</a></div>
        <div><a href="#" id='regEmpresa'>Registrar Empresa</a></div>
    </div>
    <div class="contenedorRegistrarEmpresas">
            <div class="cREmpresa1">
                <b >FORMULARIO DE REGISTRO DE EMPRESA</b>
            </div>    
            <div class="cREmpresa2">
                <div class="FormEmpresa">
                    <div class="FE1">
                        <label class="etiquetaForm">Razón Social</label>
                        <label class="etiquetaForm">RUC</label>
                        <label class="etiquetaForm">Dirección</label>
                        <label class="etiquetaForm">Email</label>
                        <label class="etiquetaForm">Teléfono</label>
                    </div>
                    <div class="FE2">
                        <input type=text class="etiquetaForm">
                        <input type=text class="etiquetaForm">
                        <input type=text class="etiquetaForm">
                        <input type=text class="etiquetaForm">
                        <input type=text class="etiquetaForm">
                    </div>
                    <div class="FE3">
                        <label>Usuario:</label>
                        <input type=text>
                        <label>Contraseña:</label>
                        <input type=text>
                        <label>Confirmar Contraseña:</label>
                        <input type=text>
                    </div>
                </div>
            </div>    
            <div class="cREmpresa3">
                    <button class="botonEnviar" id="idCancelarE">Cancelar</button>
                    <button class="botonEnviar">Enviar</button>
            </div>
    </div>

        <div class="contenedorRegistrarUsuario">
            <div class="cRUsuario1">
                <b >FORMULARIO DE REGISTRO DE USUARIOS</b>
            </div>    
            <div class="cRUsuario2">
                <div class="FormUser">
                    <div class="FU1">
                        <label class="etiquetaForm">Nombre</label>
                        <label class="etiquetaForm">Apellido</label>
                        <label class="etiquetaForm">Correo</label>
                        <label class="etiquetaForm">Usuario</label>
                    </div>
                    <div class="FU2">
                        <input type=text class="etiquetaForm">
                        <input type=text class="etiquetaForm">
                        <input type=text class="etiquetaForm">
                        <input type=text class="etiquetaForm">
                    </div>
                    <div class="FU3">
                        <label>Contraseña:</label>
                        <input type=text>
                        <label>Confirmar Contraseña:</label>
                        <input type=text>
                    </div>
                </div>
            </div>    
            <div class="cRUsuario3">
                    <button class="botonEnviar" id="idCancelarU">Cancelar</button>
                    <button class="botonEnviar">Enviar</button>
            </div>
    </div>
</body>
</html>