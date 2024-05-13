<div class="container py-4">
    <div class="card bg-transparent">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4>Recordatorios</h4>
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
                            <th class="bg-green">Descripcion</th>
                            <th class="bg-green">Categoria</th>
                            <th class="bg-green">Moneda</th>
                            <th class="bg-green">Monto</th>
                            <th class="bg-green">Nro Cuotas</th>
                            <th class="bg-green">Fecha</th>
                            <th class="bg-green">Estado</th>
                            <th class="bg-green">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="body-recordatorios">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="HistorialPagosModal" tabindex="-1" aria-labelledby="HistorialPagosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Historial de pagos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-light table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th class="bg-green">#</th>
                                <th class="bg-green">Categoria</th>
                                <th class="bg-green">Nombre</th>
                                <th class="bg-green">Monto</th>
                                <th class="bg-green">Nro Cuotas</th>
                                <th class="bg-green">Fecha</th>
                                <th class="bg-green">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="body-historydetailsrecordatorios">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EstadoRecordatorioModal" tabindex="-1" aria-labelledby="EstadoRecordatorioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Estado recordatorio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="updateStatusRecordatorio" class="form-label">Estado</label>
                    <input type="text" class="form-control input-yellow d-none" id="updateIdRecordatorio">
                    <select class="form-select input-yellow" id="updateStatusRecordatorio">
                        <option value="2">En proceso</option>
                        <option value="3">Cancelado</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn button-red" id="btnupdateStatusRecordatorio">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        ListReminders()
    })
</script>