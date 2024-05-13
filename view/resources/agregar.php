<div class="container py-4">
    <div class="card bg-transparent">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4>Agregar pago</h4>
            </div>
        </div>
        <div class="card-body">
            <form id="form-register">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="addCategoria" class="form-label">Categoria</label>
                        <select class="form-select input-yellow" id="addCategoria">
                            <option value="" selected>Seleccionar</option>
                            <option value="1">Servicios Básicos</option>
                            <option value="2">Facturas</option>
                            <option value="3">Multas</option>
                            <option value="4">Recurrentes</option>
                            <option value="5">Prestamos</option>
                            <option value="6">Impuestos</option>
                            <option value="7">Otros</option>
                        </select>
                    </div>
                    <div class="col-md-9 mb-3">
                        <label for="addDescripcion" class="form-label">Descripcion</label>
                        <input type="text" class="form-control input-yellow" id="addDescripcion">
                        <input type="text" class="form-control input-yellow d-none" id="addIdUser" value="<?php echo $_SESSION["idpaypo"] ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="addFecha" class="form-label">Fecha pago o de inicio</label>
                        <input type="date" class="form-control input-yellow" id="addFecha" min="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d") ?>">
                    </div>
                    <div class="col-md-1 mb-3">
                        <label for="addCuotas" class="form-label">Cuotas</label>
                        <input type="text" class="form-control input-yellow numero" readonly id="addCuotas" value="1">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="addRango" class="form-label">Rango <span class="fst-italic fw-light msg-label">Si tiene cuotas</span></label>
                        <select class="form-select input-yellow" id="addRango" disabled>
                            <option value="30" selected>30 dias</option>
                            <option value="15">15 dias</option>
                            <option value="7">7 dias</option>
                            <option value="1">1 dia</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="addMoneda" class="form-label">Moneda</label>
                        <select class="form-select input-yellow" id="addMoneda">
                            <option value="1" selected>Soles</option>
                            <option value="2">Dolares</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="addMonto" class="form-label">Monto</label>
                        <input type="text" class="form-control input-yellow numero" id="addMonto" placeholder="0.00">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn button-red" id="btnRegisterPago">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>