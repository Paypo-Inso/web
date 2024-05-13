$("#addCategoria").change(function () {
    var opcion = $(this).val();
    if(opcion == 2 || opcion == 5){
        $("#addCuotas").attr("readonly", false);
        $("#addRango").attr("disabled", false);
    } else {
        $("#addRango").attr("disabled", true).val("30");
        $("#addCuotas").attr("readonly", true);
        $("#addCuotas").val("1")
    }
});

$("#btnRegisterPago").click(function(){
    var id = $("#addIdUser").val();
    var categoria = $("#addCategoria").val();
    var descripcion = $("#addDescripcion").val();
    var fecha = $("#addFecha").val();
    var cuota = $("#addCuotas").val();
    var moneda = $("#addMoneda").val();
    var monto = $("#addMonto").val();
    var rango = $("#addRango").val();

    if(categoria != '' && descripcion != '' && fecha != ''
    && cuota != '' && moneda != '' && monto != '') {

        monto = parseFloat(monto).toFixed(2);

        if(monto > 0){

            $.ajax({
                url: "view/public/ajax/pagos.ajax.php",
                method: "POST",
                data: {
                    addcategoria: categoria,
                    adddescripcion: descripcion,
                    addfecha: fecha,
                    addcuota: cuota,
                    addmoneda: moneda,
                    addmonto: monto,
                    addrango: rango,
                    addid: id,
                },
                success: function (data) {
                    $(".js-contenedorrespuestasalertas").html(data);
                },
            });

        } else {
            sweetErrorMonto()
        }

    } else {
        sweetAlert()
    }
})