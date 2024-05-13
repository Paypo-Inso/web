<?php

require_once "../../../database/conexion.php";

if (isset($_POST["idListRecordatorio"])) {

    $id = $_POST["idListRecordatorio"];

    $statement = Conexion::conectar()->prepare("SELECT reminders_id, descrip, general_amount, currency, quota_number, categories_id, STATUS, date_start FROM reminders WHERE id_user = :id");
    $statement->execute(
        array(
            ':id' => $id,
        )
    );

    $result = $statement->fetchAll();

    $tabla = "";
    $categoria = "";
    $estado = "";
    $moneda = "";
    

    if ($statement->rowCount() > 0) {

        foreach ($result as $key => $value) {
            
            $button = "";

            switch ($value["categories_id"]) {
                case 1:
                    $categoria = "<i class='fa-solid fa-lightbulb me-2'></i> Servicios Básicos";
                    break;
                case 2:
                    $categoria = "<i class='fa-solid fa-file-invoice-dollar me-2'></i> Facturas";
                    break;
                case 3:
                    $categoria = "<i class='fa-solid fa-triangle-exclamation me-2'></i> Multas";
                    break;
                case 4:
                    $categoria = "<i class='fa-solid fa-mobile-screen me-2'></i> Recurrentes";
                    $button = '<button class="btn btn-sm btn-light" onClick="updateEstadoRecordatorio(' . $value["reminders_id"] . ','. $value["STATUS"] .')">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>';
                    break;
                case 5:
                    $categoria = "<i class='fa-solid fa-landmark me-2'></i> Prestamos";
                    break;
                case 6:
                    $categoria = "<i class='fa-solid fa-file-invoice me-2'></i> Impuestos";
                    break;
                case 7:
                    $categoria = "<i class='fa-regular fa-square-caret-right me-2'></i> Otros";
                    break;
            }
            
            switch ($value["STATUS"]) {
                case 1:
                    $estado = "<span class='badge text-bg-success'><i class='fa-solid fa-check me-2'></i> Pagado</span>";
                    break;
                case 2:
                    $estado = "<span class='badge text-bg-info'><i class='fa-regular fa-hourglass-half me-2'></i> En proceso</span>";
                    break;
                case 3:
                    $estado = "<span class='badge text-bg-secondary'><i class='fa-solid fa-ban me-2'></i> Cancelado</span>";
                    break;
            }
            
            switch ($value["currency"]) {
                case 1:
                    $moneda = "Soles";
                    break;
                case 2:
                    $moneda = "Dolares";
                    break;
            }

            $tabla .= '<tr>
                        <td class="text-center">' . ($key + 1) . '</td>
                        <td class="text-center">' . $value["descrip"] . '</td>
                        <td class="text-center">' . $categoria . '</td>
                        <td class="text-center">' . $moneda . '</td>
                        <td class="text-center">' . $value["general_amount"] . '</td>
                        <td class="text-center">' . $value["quota_number"] . '</td>
                        <td class="text-center">' . $value["date_start"] . '</td>
                        <td class="text-center">' . $estado . '</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-secondary" onClick="ShowListDetailsReminders(' . $value["reminders_id"] . ')">
                                <i class="fa-solid fa-table-list"></i>
                            </button>
                            '.$button.'
                            <button class="btn btn-sm btn-danger" onClick="deleteReminders(' . $value["reminders_id"] . ')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>';
        }
    }

    $statement = null;
    echo $tabla;
}

if (isset($_POST["idDeleteRecordatorio"])) {

    $stmt = Conexion::conectar()->prepare("CALL DeleteReminder(:id)");

    $stmt->bindParam(":id", $_POST["idDeleteRecordatorio"], PDO::PARAM_INT);

    $stmt->execute();

    $result = $stmt->fetch();

    $resp = "";

    if($result["v_resp"] == 0){
        $resp = '<script>
            swal({
                type: "error",
                title: "Error de eliminacion",
                text: "Existen pagos realizados con este recordatorio",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
            }).then(function (result) {
                
            });
        </script>';
    } else {
        $resp = '<script>
            swal({
                type: "success",
                title: "Eliminacion exitosa",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
            }).then(function (result) {
                
            });
        </script>';
    }
    $stmt = null;
    echo $resp;
}

if (isset($_POST["idShowDetailsRecordatorio"])) {

    $iduser = $_POST["idUserShowDetailsRecordatorio"];
    $id = $_POST["idShowDetailsRecordatorio"];

    $statement = Conexion::conectar()->prepare("SELECT d.name, d.quota, d.amount, d.status, r.categories_id, 
    d.payment_date FROM reminders_details d INNER JOIN reminders r ON d.reminders_id = r.reminders_id 
    WHERE r.id_user = :iduser AND r.reminders_id = :id ORDER BY reminders_details_id desc");
    $statement->execute(
        array(
            ':iduser' => $iduser,
            ':id' => $id,
        )
    );

    $result = $statement->fetchAll();

    $tabla = "";
    $categoria = "";
    $estado = "";

    if ($statement->rowCount() > 0) {

        foreach ($result as $key => $value) {

            switch ($value["categories_id"]) {
                case 1:
                    $categoria = "<i class='fa-solid fa-lightbulb me-2'></i> Servicios Básicos";
                    break;
                case 2:
                    $categoria = "<i class='fa-solid fa-file-invoice-dollar me-2'></i> Facturas";
                    break;
                case 3:
                    $categoria = "<i class='fa-solid fa-triangle-exclamation me-2'></i> Multas";
                    break;
                case 4:
                    $categoria = "<i class='fa-solid fa-mobile-screen me-2'></i> Recurrentes";
                    break;
                case 5:
                    $categoria = "<i class='fa-solid fa-landmark me-2'></i> Prestamos";
                    break;
                case 6:
                    $categoria = "<i class='fa-solid fa-file-invoice me-2'></i> Impuestos";
                    break;
                case 6:
                    $categoria = "<i class='fa-regular fa-square-caret-right me-2'></i> Otros";
                    break;
            }
            
            switch ($value["status"]) {
                case 1:
                    $estado = "<span class='badge text-bg-warning'><i class='fa-solid fa-check me-2'></i> Pagado</span>";
                    break;
                case 2:
                    $estado = "<span class='badge text-bg-danger'><i class='fa-regular fa-hourglass-half me-2'></i> Pendiente</span>";
                    break;
                case 3:
                    $estado = "<span class='badge text-bg-warning'><i class='fa-solid fa-circle-exclamation me-2'></i> Por vencer</span>";
                    break;
                case 4:
                    $estado = "<span class='badge text-bg-danger'><i class='fa-solid fa-rectangle-xmark me-2'></i> Vencido</span>";
                    break;
            }

            $tabla .= '<tr>
                        <td class="text-center">' . ($key + 1) . '</td>
                        <td class="text-center">' . $categoria . '</td>
                        <td class="text-center">' . $value["name"] . '</td>
                        <td class="text-center">' . $value["amount"] . '</td>
                        <td class="text-center">' . $value["quota"] . '</td>
                        <td class="text-center">' . $value["payment_date"] . '</td>
                        <td class="text-center">' . $estado . '</td>
                    </tr>';
        }
    }

    $statement = null;
    echo $tabla;
}

if (isset($_POST["idUpdateStatusRecordatorio"])) {

    $stmt = Conexion::conectar()->prepare("UPDATE reminders SET STATUS = :estado WHERE reminders_id = :id");

    $stmt->bindParam(":id", $_POST["idUpdateStatusRecordatorio"], PDO::PARAM_INT);
    $stmt->bindParam(":estado", $_POST["estadoUpdateStatusRecordatorio"], PDO::PARAM_INT);

    $stmt->execute();

    $resp = "";

    $stmt = null;
    echo $resp;
}