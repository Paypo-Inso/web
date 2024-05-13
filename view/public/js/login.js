$("#btnRegister").click(function () {
    var nombre = $("#addnombre").val();
    var apellido = $("#addapellidos").val();
    var email = $("#addemail").val();
    var pass = $("#addpassword").val();

    if(nombre != '' && apellido != '' && email != '' && pass != ''){
        if(validarcorreo(email)){
            if(pass.length > 6) {
                $.ajax({
                    url: "view/public/ajax/user.ajax.php",
                    method: "POST",
                    data: {
                        addnombre: nombre,
                        addapellido: apellido,
                        addemail: email,
                        addpass: pass,
                    },
                    success: function (data) {
                        $(".js-contenedorrespuestasalertas").html(data);
                    },
                });
            } else {
                swal({
                    type: "info",
                    title: "contraseña invalida",
                    text: "La contraseña debe tener mas de 6 caracteres",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                }).then((result) => {});
            }
            
        } else {
            swal({
                type: "info",
                title: "correo invalido",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
            }).then((result) => {});
        }
    } else {
        sweetAlert()
    }
    
});
