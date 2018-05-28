<?php
$nv = $this->session->userdata("praga_tipo");
?>
<div class="sidebar-menu">

    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a style="color: white;" href="<?=base_url("index.php/admin/inicio") ?>">IMPORTWORDLL</a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon">
                    <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>


            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>


        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <?php if(in_array($nv,array(0))){?>

                <li>
                    <a href="<?=site_url("admin/crear") ?>">
                        <i class="fa fa-edit"></i>
                        <span class="title">Registro</span>
                    </a>
                </li>
                <li>
                    <a href="<?=site_url("admin/reporte") ?>">
                        <i class="fa fa-archive"></i>
                        <span class="title">Reporte</span>
                    </a>
                </li>
                <li>
                    <a href="<?=site_url("admin/salir") ?>">
                        <i class="entypo-logout"></i>
                        <span class="title">Salir</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>