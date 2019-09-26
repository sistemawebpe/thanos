$(document).ready(function(){
    
    $.ajax({
        type:'post',
        url:'procesarEmpresa.php',
        data:{Action:'ListarDistrito'},
        dataType:'json',
        success:function(respu)
        {
            $.each(respu.distrito,function(i, item)
            {
                $('#lstProvincias').append("<option value="+item.idDistrito+">"+item.NDistrito+"</option>");
            });
        }
    });
    function validarForm(){
        var msg="";
        if($("#txtNombre").val()==""){ msg=msg + "El nombre de estación no puede esta vacio\n";}
        if($("#txtTelefono").val()==""){ msg=msg + "El teléfono no puede estar vacio\n";}
        if($("#txtDireccion").val()==""){ msg=msg + "La direccion no puede estar vacio\n";}
        if($("#lstProvincias").val()=="0"){ msg=msg + "Seleccione una lista\n";}
        if($("#g84").val()==""){ msg=msg + "Precio de la gasolina de 84 esta vacio\n";}
        if($("#g90").val()==""){ msg=msg + "Precio de la gasolina de 90 esta vacio\n";}
        if($("#g95").val()==""){ msg=msg + "Precio de la gasolina de 95 esta vacio\n";}
        if($("#g97").val()==""){ msg=msg + "Precio de la gasolina de 97 esta vacio\n";}
        if($("#g98").val()==""){ msg=msg + "Precio de la gasolina de 98 esta vacio\n";}
        if($("#s50").val()==""){ msg=msg + "Precio de la gasolina de 50 esta vacio\n";}
        if(msg==""){
            return true;
        }else{
            alert(msg);
            return false;
        }

    }
    $("#btnRegistrarEst").click(function(e){
        e.preventDefault();
        if(validarForm()){
            $("#txtAction").val("GrabarEstacion");
            $.ajax({
                type:'post',
                url:'clienteRest.php',
                data:$("#formularioD").serialize(),
                dataType:'json',
                success:function(res)
                {
                    var p=$.parseJSON(res)
                    console.log(p.Mensaje);
                    if (p.Mensaje=="OK"){
                        alert("Se agregó correctamente ");
                        $("#formularioD")[0].reset();
                    }else{
                        alert("Error al grabar ");
                    }
                }
            });
        }    
    });
    $("#btnReset").click(function(e){
        e.preventDefault();
        $("#formularioD")[0].reset();
    });
    
    $( "#dialog-message" ).dialog({
        modal: true,
        buttons: {
          Ok: function() {
            $( this ).dialog( "close" );
          }
        }
    });
});