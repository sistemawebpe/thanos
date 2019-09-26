function validarIngreso() {

    var expresion = /^[a-zA-Z0-9]*$/;


    if (!expresion.test($("#documento").val())) {

        return false;
    }
    
     if (!expresion.test($("#reserva").val())) {

        return false;
    }


    return true;

}
