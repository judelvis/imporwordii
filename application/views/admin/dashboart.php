<body class="page-body  page-fade">

<div class="page-container">
    <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
    <?php $this->load->view("admin/incluir/menu"); ?>

    <div class="main-content">

        <?php $this->load->view("admin/incluir/barra");?>

        <hr/>

        <?php
        $this->load->view($vista);?>

        <br/>
        <!-- Footer -->
        <footer class="main" style="text-transform: capitalize;">
            <span>Sistema de Control</span>        </footer>
    </div>
</div>
