$(".numero").keydown(function (e) {
    if (
        $.inArray(e.keyCode, [46, 8, 9, 27, 13, 109, 110, 189, 190]) !== -1 ||
        (e.keyCode == 65 && e.ctrlKey === true) ||
        (e.keyCode >= 35 && e.keyCode <= 39)
    ) {
        return;
    }

    if (
        (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
        (e.keyCode < 96 || e.keyCode > 105)
    ) {
        e.preventDefault();
    }
});

function pulsarenter(e) {
    if (e.which === 13 && !e.shiftKey) {
        e.preventDefault();
        return false;
    }
}

function validarcorreo(correo) {
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    return regex.test(correo)
}

function sweetAlert(){
    swal({
        type: "info",
        title: "Datos incompletos!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
    }).then((result) => {});
}

function sweetError(){
    swal({
        type: "error",
        title: "ocurrio un error",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
    }).then((result) => {
    });
}

function sweetErrorMonto(){
    swal({
        type: "error",
        title: "Error de monto",
        text: "El monto tiene que ser mayor a cero",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
    }).then((result) => {
    });
}

function sweetSuccessUpdate(){
    swal({
        type: "success",
        title: "Actualización exitosa",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
    }).then((result) => {
    });
}

//#region ANULAR REENVIO DE FURMULARIO
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
