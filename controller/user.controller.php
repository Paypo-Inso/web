<?php

class ControladorUser
{
    static public function ctrLoginUser()
    {
        if (isset($_POST["emailUser"])) {

            $correo = $_POST["emailUser"];
            $pass = $_POST["passwordUser"];

            $datos = array(
                "correo" => $correo,
                "contra" => $pass
            );

            $respuesta = ModeloUser::MdlLoginUser($datos);

            if (!empty($respuesta)) {

                $_SESSION["iniciarSesionPaypo"] = "ok";
                $_SESSION["idpaypo"] = $respuesta["id_user"];
                $_SESSION["nombrepaypo"] = $respuesta["first_name"];
                $_SESSION["apellidopaypo"] = $respuesta["last_name"];
                $_SESSION["correopaypo"] = $respuesta["email"];

                echo '<script>
                    window.location = "inicio";
                </script>';

            } else {

                echo '<br>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error al ingresar, vuelve a intentarlo o es posible que no tengas acceso a esta plataforma.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }
}