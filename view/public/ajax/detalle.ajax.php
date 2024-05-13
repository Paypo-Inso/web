<?php

require_once "../../../database/conexion.php";

if (isset($_POST["idDetailsRecordatorio"])) {

    $id = $_POST["idDetailsRecordatorio"];

    $statement = Conexion::conectar()->prepare("SELECT d.reminders_details_id, r.descrip, r.currency, d.name, d.amount, 
    d.quota, d.status, r.categories_id, d.payment_date FROM reminders_details d INNER JOIN reminders r ON 
    d.reminders_id = r.reminders_id WHERE d.status > 2 AND r.id_user = :id");
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
                case 3:
                    $estado = "<span class='badge text-bg-warning'><i class='fa-solid fa-circle-exclamation me-2'></i> Por vencer</span>";
                    break;
                case 4:
                    $estado = "<span class='badge text-bg-danger'><i class='fa-solid fa-rectangle-xmark me-2'></i> Vencido</span>";
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
                        <td class="text-center">' . $categoria . '</td>
                        <td class="text-center">' . $value["descrip"] . '</td>
                        <td class="text-center">' . $value["name"] . '</td>
                        <td class="text-center">' . $moneda . '</td>
                        <td class="text-center">' . $value["amount"] . '</td>
                        <td class="text-center">' . $value["quota"] . '</td>
                        <td class="text-center">' . $estado . '</td>
                        <td class="text-center">' . $value["payment_date"] . '</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-secondary" onClick="updateStatusDetailsReminders(' . $value["reminders_details_id"] . ')">
                            <i class="fa-solid fa-check"></i>
                            </button>
                        </td>
                    </tr>';
        }
    }

    $statement = null;
    echo $tabla;
}

if (isset($_POST["idConfirmRecordatorio"])) {

    $stmt = Conexion::conectar()->prepare("UPDATE reminders_details SET status = 1 WHERE reminders_details_id = :id");

    $stmt->bindParam(":id", $_POST["idConfirmRecordatorio"], PDO::PARAM_INT);

    $stmt->execute();

    $resp = "";

    $stmt = null;
    echo $resp;
}