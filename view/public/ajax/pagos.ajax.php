<?php

require_once "../../../database/conexion.php";

if (isset($_POST["addid"])) {

    $id = $_POST["addid"];
    $categoria = $_POST["addcategoria"];
    $descripcion = $_POST["adddescripcion"];
    $fecha = $_POST["addfecha"];
    $cuota = $_POST["addcuota"];
    $moneda = $_POST["addmoneda"];
    $monto = $_POST["addmonto"];
    $rango = $_POST["addrango"];

    $statement = Conexion::conectar()->prepare("CALL InsertReminder(:monto, :cuota, 
    :moneda, :descripcion, :categoria, :fecha, :id, :rango)");
    $statement->execute(
        array(
            ':id' => $id,
            ':categoria' => $categoria,
            ':descripcion' => $descripcion,
            ':fecha' => $fecha,
            ':cuota' => $cuota,
            ':moneda' => $moneda,
            ':monto' => $monto,
            ':rango' => $rango,
        )
    );

    $result = $statement->fetch();

        $resp = '<script>
            swal({
                type: "success",
                title: "Registro exitoso",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
            }).then((result) => {
                $("#addDescripcion").val("");
                $("#addCuotas").val("1");
                $("#addMonto").val("");
            });
        </script>';

    $statement = null;
    echo $resp;
}

?>