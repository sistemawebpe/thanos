$(document).ready(function(){
    
    $('#btnEnviar').click(function(e)
    {
        e.preventDefault();
        $.ajax({
            type:'post',
            url:'clienteRest.php',
            data:{txtAction:'login',txtUsuario:$("#txtUsuario").val(),txtClave:$("#txtClave").val()},
            dataType:'json',
            success:function(respu)
            {
                var p=$.parseJSON(respu)
                console.log(p.Mensaje);
                if (p.Mensaje=="OK"){
                    window.location="login1.php?login=" + $("#txtUsuario").val();
                }else{
                    alert("Usuario o clave no son carrectos");
                }
            }
        });
    });
});