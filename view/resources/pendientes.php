<div class="container py-4">
    <div class="card bg-transparent">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4>Recordarios</h4>
                <a href="agregar" type="button" class="btn btn-secondary">
                    <i class="fa-solid fa-plus"></i> Registrar pago
                </a>
            </div>
        </div>
        <div class="card-body">
            <input type="text" class="form-control input-yellow d-none" 
            id="listIdUser" value="<?php echo $_SESSION["idpaypo"] ?>">
            <div class="table-responsive">
                <table class="table table-light table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th class="bg-green">#</th>
                            <th class="bg-green">Categoria</th>
                            <th class="bg-green">Descripcion</th>
                            <th class="bg-green">Nombre</th>
                            <th class="bg-green">Moneda</th>
                            <th class="bg-green">Monto</th>
                            <th class="bg-green">Nro Cuotas</th>
                            <th class="bg-green">Estado</th>
                            <th class="bg-green">Fecha</th>
                            <th class="bg-green">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="body-detallerecordatorios">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        ListDetailsReminders()
    })
</script>