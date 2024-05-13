<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card bg-transparent p-4" style="width: 25rem;">
        <div class="card-body">
            <form method="POST" id="form-login">
                <h3 class="card-title text-center mb-3">Iniciar sesión</h3>
                <div class="mb-3">
                    <input type="email" class="form-control input-yellow" name="emailUser" placeholder="Ingrese su correo">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control input-yellow" name="passwordUser" placeholder="Ingrese su contraseña">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn button-red" id="btnLogin">Iniciar sesión</button>
                </div>
                <?php
                    if (isset($_POST["emailUser"])) {
                            $login = new ControladorUser();
                            $login->ctrLoginUser();
                    }
                ?>
            </form>
            <hr>
            <div class="text-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">¿No tienes una cuenta? Regístrate aquí</a>
            </div>
            <div class="js-contenedorrespuestasalertas"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Registrarse</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-register">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="addnombre" placeholder="Nombre">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="addapellidos" placeholder="Apellidos">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="addemail" placeholder="Correo electrónico">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="addpassword" placeholder="Contraseña">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn button-red" id="btnRegister">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>