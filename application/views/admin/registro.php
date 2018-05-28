<div class="container-fluid">
    <h2>Crear Jugador</h2>
    <br/>
    <form role="form" id="frm-jugador" class="form-horizontal" action="#" method="post" onsubmit="return guardar();">
        <div class="row">
            <div class="form-group">
                <div class="col-md-3 ">
                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Login" required/>
                </div>
                <div class="col-md-3 ">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required/>
                </div>
                <div class="col-md-3 ">
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required/>
                </div>
                <div class="col-md-3 ">
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <input type="hidden" name="<?= $csrf['name']; ?>" id="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>">
                    <button type="submit" class="btn btn-green btn-icon btn-lg" id="btnGuardar" style="width: 100%">Crear <i
                                class="fa fa-save"></i></button>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <br>
</div>