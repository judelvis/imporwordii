<h2>Agregar Tipo de Producto ( Menu)  </h2>
<br/>
<form role="form" id="frmtipo" class="form-horizontal" action="#" method="post" onsubmit="return guardar();">
    <div class="row">
        <div class="form-group">
            <div class="col-md-3">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required/>
            </div>
            <div class="col-md-2">
                <input type="hidden" name="<?= $csrf['name']; ?>" id="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
                <button type="submit" class="btn btn-green btn-icon" id="btnGuardar">Crear <i
                            class="fa fa-save"></i></button>        </div>
        </div>
    </div>
</form>
<br>
 <div class="row">
                <div class="col-md-12">
                    <div class="row"><h4>Lista de Tipos de Productos Existentes</h4>
                        <table class="table table-striped table-responsive table-bordered" id="listartipos">
                            <thead><tr>
                                <th>nombre</th>
                                <th>editar</th>
                            </tr></thead>
                            <tbody id="cuerpo">
                            <tr><td colspan="7">No posee Ganancias registrados</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
