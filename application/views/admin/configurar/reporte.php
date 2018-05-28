<div class="container-fluid">
    <h2>Reporte de transferencia</h2>
    <br/>

    <div class="row">
        <div class="form-group">
            <div class="col-md-1 ">
                <span>Criterio</span>
            </div>
            <div class="col-md-3">
                <select class="select2" id="criterio" name="criterio">
                    <option value="fecha">Fecha de transferencia</option>
                    <option value="creado">Fecha de creación</option>
                </select>
            </div>
            <div class="col-md-1 ">
                <span>Desde</span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" id="desde" name="desde">
                    <div class="input-group-addon">
                        <a href="#"><i class="entypo-calendar"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-1 ">
                <span>Hasta</span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" id="hasta" name="hasta">
                    <div class="input-group-addon">
                        <a href="#"><i class="entypo-calendar"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
                <input type="hidden" id="dd" value="">
                <input type="hidden" id="dh" value="">
                <button type="button" class="btn btn-green btn-icon btn-lg" id="btnReporte" style="width: 100%">
                    Generar<i
                            class="fa fa-book"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <div class="row">
        <table id="tablaresp" class="table table-responsive table-bordered table-striped">
            <thead>
                <tr><th>#</th><th>Referencia</th><th>Monto</th><th>Nombre</th><th>Cedula/Rif</th><th>Fecha</th><th>Registro</th><th>Eliminar</th></tr>
            </thead>
            <tbody></tbody>
            <tfoot>
            <tr>
                <th colspan="2" style="text-align:right">Total:</th>
                <th colspan="6" style="text-align:left"></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>