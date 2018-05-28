<div class="modal fade" id="mensajes">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Información</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="msj">

                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Imported styles on this page -->

<link rel="stylesheet" href="<?= __MAQ__ ?>admin/js/rickshaw/rickshaw.min.css">
<link rel="stylesheet" href="<?= __MAQ__ ?>admin/js/zurb-responsive-tables/responsive-tables.css">
<link rel="stylesheet" href="<?= __MAQ__ ?>admin/css/font-icons/font-awesome/css/font-awesome.css">


<!-- Imported styles on this page -->
<link rel="stylesheet" href="<?= __MAQ__ ?>admin/js/datatables/responsive/css/datatables.responsive.css">
<link rel="stylesheet" href="<?= __MAQ__ ?>admin/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="<?= __MAQ__ ?>admin/js/select2/select2.css">
<!-- Bottom scripts (common) -->

<script src="<?= __MAQ__ ?>admin/js/gsap/main-gsap.js"></script>
<script src="<?= __MAQ__ ?>admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?= __MAQ__ ?>admin/js/bootstrap.js"></script>
<script src="<?= __MAQ__ ?>admin/js/joinable.js"></script>
<script src="<?= __MAQ__ ?>admin/js/resizeable.js"></script>
<script src="<?= __MAQ__ ?>admin/js/bootstrap-switch.min.js"></script>
<script src="<?= __MAQ__ ?>admin/js/neon-api.js"></script>

<script src="<?= __MAQ__ ?>admin/js/zurb-responsive-tables/responsive-tables.js"></script>

<script src="<?= __JSVIEW__ ?>general/global.js"></script>
<script src="<?= __MAQ__ ?>admin/js/jquery.dataTables.min.js"></script>
<script src="<?= __MAQ__ ?>admin/js/datatables/TableTools.min.js"></script>


<!-- Imported scripts on this page -->
<script src="<?= __MAQ__ ?>admin/js/dataTables.bootstrap.js"></script>
<script src="<?= __MAQ__ ?>admin/js/datatables/jquery.dataTables.columnFilter.js"></script>
<script src="<?= __MAQ__ ?>admin/js/datatables/lodash.min.js"></script>
<script src="<?= __MAQ__ ?>admin/js/datatables/responsive/js/datatables.responsive.js"></script>
<script src="<?= __MAQ__ ?>admin/js/select2/select2.min.js"></script>
<script src="<?= __MAQ__ ?>admin/js/fileinput.js"></script>

<!-- Imported scripts on this page -->


<script src="<?= __MAQ__ ?>admin/js/jquery.sparkline.min.js"></script>
<script src="<?= __MAQ__ ?>admin/js/rickshaw/vendor/d3.v3.js"></script>
<script src="<?= __MAQ__ ?>admin/js/rickshaw/rickshaw.min.js"></script>
<script src="<?= __MAQ__ ?>admin/js/raphael-min.js"></script>
<script src="<?= __MAQ__ ?>admin/js/morris.min.js"></script>
<script src="<?= __MAQ__ ?>admin/js/toastr.js"></script>



<script src="<?= __MAQ__ ?>admin/js/bootstrap-datepicker.js"></script>
<script src="<?= __MAQ__ ?>admin/js/jquery.multi-select.js"></script>
<!-- JavaScripts initializations and stuff -->
<script src="<?= __MAQ__ ?>admin/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="<?= __MAQ__ ?>admin/js/neon-demo.js"></script>
<script src="<?= __MAQ__ ?>admin/js/jquery.inputmask.bundle.min.js"></script>

<script src="<?= __MAQ__ ?>admin/js/jquery.bootstrap.wizard.min.js"></script>
<script src="<?= __JSVIEW__ ?>general/numeral.js"></script>


<!-- script de vista si existe -->
<?php if(isset($adicionales)){
    foreach ($adicionales as $scp){?>
        <script src="<?=$scp ?>"></script>
<?php }} ?>
<?php if(isset($vista)){?>
    <script src="<?= __JSVIEW__.$vista ?>"></script>
<?php } ?>



</body>
</html>