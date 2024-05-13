<?php

require_once "database/conexion.php";

class ModeloUser
{
    static public function MdlLoginUser($datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_user, first_name, last_name, email 
        FROM USER WHERE email = :correo AND pass = :contra");

        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":contra", $datos["contra"], PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();
        $stmt = null;
    }
}