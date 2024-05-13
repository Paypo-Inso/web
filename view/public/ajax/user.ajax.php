<?php

require_once "../../../database/conexion.php";

if (isset($_POST["addnombre"])) {

    $email = $_POST["addemail"];
    $pass = $_POST["addpass"];
    $nombre = $_POST["addnombre"];
    $apellido = $_POST["addapellido"];

    $statement = Conexion::conectar()->prepare("INSERT user(email, pass, first_name, last_name) 
    VALUES(:email, :pass, :nombre, :apellido)");
    $statement->execute(
        array(
            ':email' => $email,
            ':pass' => $pass,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
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
                $("#registerModal").modal("hide")
                $("#addnombre").val("");
                $("#addapellidos").val("");
                $("#addemail").val("");
                $("#addpassword").val("");
            });
        </script>';

    $statement = null;
    echo $resp;
}

?>