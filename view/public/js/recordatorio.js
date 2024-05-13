function ListReminders() {
    var id = $("#listIdUser").val();
    $.ajax({
        url: "view/public/ajax/recordatorios.ajax.php",
        method: "POST",
        data: {
            idListRecordatorio: id,
        },
        success: function (data) {
            $(".body-recordatorios").html(data)
        },
    });
}

function deleteReminders(id){
    swal({
		type: "question",
		title: `¿Quieres eliminar el recordatorio?`,
		cancelButtonColor: "#FB2C2C",
		showConfirmButton: true,
		showCancelButton: true,
		confirmButtonText: "Si",
		cancelButtonText: "Cancelar",
		closeOnConfirm: false,
	}).then((result) => {
		if (result.value) {
            $.ajax({
                url: "view/public/ajax/recordatorios.ajax.php",
                method: "POST",
                data: {
                    idDeleteRecordatorio: id,
                },
                success: function (data) {
                    $(".js-contenedorrespuestasalertas").html(data);
                    ListReminders();
                },
            });
		}
	});
}

function ShowListDetailsReminders(id){
    var iduser = $("#listIdUser").val();
    $.ajax({
        url: "view/public/ajax/recordatorios.ajax.php",
        method: "POST",
        data: {
            idShowDetailsRecordatorio: id,
            idUserShowDetailsRecordatorio: iduser,
        },
        success: function (data) {
            $(".body-historydetailsrecordatorios").html(data)
            $("#HistorialPagosModal").modal("show")
        },
    }); 
}

function updateEstadoRecordatorio(id, estado){
    $("#updateStatusRecordatorio").val(estado)
    $("#updateIdRecordatorio").val(id)
    $("#EstadoRecordatorioModal").modal("show");
}

$("#btnupdateStatusRecordatorio").click(function(){
    var id = $("#updateIdRecordatorio").val();
    var estado = $("#updateStatusRecordatorio").val();

    console.log({id, estado});

    $.ajax({
        url: "view/public/ajax/recordatorios.ajax.php",
        method: "POST",
        data: {
            idUpdateStatusRecordatorio: id,
            estadoUpdateStatusRecordatorio: estado,
        },
        success: function (data) {
            $("#EstadoRecordatorioModal").modal("hide");
            sweetSuccessUpdate();
            ListReminders()
        },
    }); 
})