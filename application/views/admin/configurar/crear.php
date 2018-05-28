<div class="container-fluid">
    <h2>Registro de transferencias</h2>
    <br/>
    <form role="form" id="frm-transf" class="form-horizontal" action="#" method="post" onsubmit="return guardar();">
        <div class="row">
            <div class="form-group">
                <div class="col-md-1 ">
                    <span>Referencia</span>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Referencia" required/>
                </div>
                <div class="col-md-1 ">
                    <span>Monto</span>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="monto" name="monto" placeholder="Monto" onkeypress="return soloNumeros(event)" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 ">
                    <span>Nombre</span>
                </div>
                <div class="col-md-5 ">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required/>
                </div>
                <div class="col-md-1 ">
                    <span>Cedula/Rif</span>
                </div>
                <div class="col-md-5 ">
                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula/Rif" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 ">
                    <span>Fecha</span>
                </div>
                <div class="col-md-5 ">
                    <div class="input-group">
                        <input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" id="fecha" name="fecha">
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
                    <button type="submit" class="btn btn-green btn-icon btn-lg" id="btnGuardar" style="width: 100%">Crear <i
                            class="fa fa-save"></i></button>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <br>
</div>