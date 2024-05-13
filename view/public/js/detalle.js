function ListDetailsReminders() {
    var id = $("#listIdUser").val();
    $.ajax({
        url: "view/public/ajax/detalle.ajax.php",
        method: "POST",
        data: {
            idDetailsRecordatorio: id,
        },
        success: function (data) {
            $(".body-detallerecordatorios").html(data)
        },
    });
}

function updateStatusDetailsReminders(id){
    swal({
		type: "question",
		title: `¿Quieres confirmar el pago?`,
		cancelButtonColor: "#FB2C2C",
		showConfirmButton: true,
		showCancelButton: true,
		confirmButtonText: "Si",
		cancelButtonText: "Cancelar",
		closeOnConfirm: false,
	}).then((result) => {
		if (result.value) {
            $.ajax({
                url: "view/public/ajax/detalle.ajax.php",
                method: "POST",
                data: {
                    idConfirmRecordatorio: id,
                },
                success: function (data) {
                    sweetSuccessUpdate();
                    ListDetailsReminders();
                },
            });
		}
	});
}