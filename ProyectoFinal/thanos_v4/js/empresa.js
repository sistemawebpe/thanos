$(document).ready(function(){
    
    $('#btnEnviar').click(function(e)
    {
        e.preventDefault();
        
        lst="";
        $.ajax({
            type:'post',
            url:'procesarEmpresa.php',
            data:{Action:'ListarEstaciones','idDistrito':$("#cmbDistrito").val()},
            dataType:'json',
            success:function(respu)
            {
                //console.log(respu.estacion[0].NroEstacion);
                $('#idtabla tbody tr').html("");        
                c=0;
                $.each(respu.estacion,function(i, item)
                {
                    
                    lst="<tr>" +
                    "<td>" +item.NroEstacion + "</td>"+
                    "<td>" +item.Nombre + "</td>"+
                    "<td>" +item.Direc + "</td>"+
                    "<td>" +item.NTelf + "</td>"+
                    "<td>" +item.g85p + "</td>"+
                    "<td>" +item.g90p + "</td>"+
                    "<td>" +item.g95p + "</td>"+
                    "<td>" +item.g97p + "</td>"+
                    "<td>" +item.g98p + "</td>"+
                    "<td>" +item.gs50 + "</td>"+
                    "<td><a href='#" + item.idEmpresa +"' data-toggle='modal' data-target='.bd-example-modal-lg'><i class='far fa-eye'></i></a></td>"+
                    "</tr>";
                    c=c+1;
                    $('#idtabla tbody').append(lst);
                    
                });
                
                
            }
        });
    });

    $.ajax({
        type:'post',
        url:'procesarEmpresa.php',
        data:{Action:'ListarDistrito'},
        dataType:'json',
        success:function(respu)
        {
            $.each(respu.distrito,function(i, item)
            {
                $('#cmbDistrito').append("<option value="+item.idDistrito+">"+item.NDistrito+"</option>");
                $('#lstProvinciasModal').append("<option value="+item.idDistrito+">"+item.NDistrito+"</option>");
                
            });
        }
    });

    
    $("#idtabla").delegate("a","click",function(){
    	
        $("#txtNombre").val($(this).closest('tr').find('td:eq(1)').text());
        $("#txtDireccion").val($(this).closest('tr').find('td:eq(2)').text());
        $("#txtTelefono").val($(this).closest('tr').find('td:eq(3)').text());
        $("#lstProvinciasModal").val($("#cmbDistrito").val());
        $("#g84").val($(this).closest('tr').find('td:eq(4)').text());
        $("#g90").val($(this).closest('tr').find('td:eq(5)').text());
        $("#g95").val($(this).closest('tr').find('td:eq(6)').text());
        $("#g97").val($(this).closest('tr').find('td:eq(7)').text());
        $("#g98").val($(this).closest('tr').find('td:eq(8)').text());
        $("#s50").val($(this).closest('tr').find('td:eq(9)').text());
        $("#txtidEstacion").val($(this).closest('tr').find('td:eq(0)').text());
      
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

    $("#btnGrabarModal").click(function(e){
      e.preventDefault();
      
      if(validarForm()){
          $("#txtAction").val("GrabarEstacionModal");
          $.ajax({
              type:'post',
              url:'clienteRest.php',
              data:$("#formularioModal").serialize(),
              dataType:'json',
              success:function(res)
              {
                  var p=$.parseJSON(res)
                  console.log(p.Mensaje);
                  if (p.Mensaje=="OK"){
                      alert("Se agregó correctamente ");
                      $("#formularioModal")[0].reset();
                      $("#btnCerrarModal").click();
                      $("#btnEnviar").click();
                  }else{
                      alert("Error al grabar ");
                  }
              }
          });
      }
    });
    $("#btnEliminarModal").click(function(e){
        e.preventDefault();
        $.ajax({
            type:'post',
            url:'clienteRest.php',
            data:{"txtAction":"EliminarEstacion","idEstacion":$("#txtidEstacion").val()},
            dataType:'json',
            success:function(res)
            {
                var p=$.parseJSON(res)
                console.log(p.Mensaje);
                if (p.Mensaje=="OK"){
                    alert("Se agregó correctamente");
                    $("#formularioModal")[0].reset();
                    $("#btnCerrarModal").click();
                    $("#btnEnviar").click();
                }else if(p.Mensaje=="NoOK"){
                    alert("Todos los precios tienen que estar en cero 00.00 para que pueda borrar una estacion");    
                }else{
                    alert("Error al grabar ");
                }
            }
        });
    });
  

});