$(document).ready(function(){
    
    $('#btnAceptar').click(function(){
            $.ajax({
                type:'post',
                url:'loginAutentication.php',
                data:{Action:'validarUsuario',User:$("#txtUser").val(),Clave:$("#txtClave").val()},
                dataType:'json',
                success:function(respu){
                    alert(respu[0]);
                    
                }
             }); 
        
    });
});