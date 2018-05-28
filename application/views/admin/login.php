<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex,nofollow" />
    <meta name="author" content="mediawanderlust.com" />

    <title>Sistema de control</title>

    <link rel="stylesheet" href="<?=__MAQ__?>admin/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="<?=__MAQ__?>admin/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="<?=__MAQ__?>admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?=__MAQ__?>admin/css/neon-core.css">
    <link rel="stylesheet" href="<?=__MAQ__?>admin/css/neon-theme.css">
    <link rel="stylesheet" href="<?=__MAQ__?>admin/css/neon-forms.css">
    <link rel="stylesheet" href="<?=__MAQ__?>admin/css/custom.css">
    <link rel="stylesheet" href="<?=__MAQ__?>admin/css/skins/green.css">
    <link rel="icon" href="<?=__MAQ__?>admin/images/favicon.ico" type="image/x-icon" />
    <script src="<?=__MAQ__?>admin/js/jquery-1.11.0.min.js"></script>
    <script>$.noConflict();</script>
    <script src="<?=__JSVIEW__?>general/global.js"></script>

    <!--[if lt IE 9]><script src="<?=__MAQ__?>admin/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body login-page login-form-fall">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
    var baseurl = '';
</script>

<div class="login-container">

    <div class="login-header login-caret">

        <div class="login-content">

            <a href="<?= base_url()?>" class="logo">
               <!--<img src="<?= __IMG__ ?>empresa/logo.jpg" alt="images" width="300px">-->
                <h3 style="color:white;">IMPORTWORDLL</h3>
                <div class="companyinfo">
                    <h2><span></span></h2>
                    <p></p>
                </div>            </a><!-- progress bar indicator -->
            <div class="login-progressbar-indicator">
                <h3>50%</h3>
                <span>Cargando...</span>
            </div>
        </div>

    </div>

    <div class="login-progressbar">
        <div></div>
    </div>

    <div class="login-form">

        <div class="login-content">

            <div class="form-login-error">
                <h3>Datos invalidos</h3>
                <p>Ingrese usuario y clave validos.</p>
            </div>

            <form method="post" role="form" id="form_login">

                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>

                        <input type="text" class="form-control" name="username" id="username" placeholder="Usuario" autocomplete="off"  required/>
                    </div>

                </div>

                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>

                        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" autocomplete="off" required/>
                    </div>

                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-login"></i>
                        Entrar
                    </button>
                </div>
            </form>

        </div>

    </div>

</div>


<!-- Bottom scripts (common) -->
<script src="<?=__MAQ__?>admin/js/gsap/main-gsap.js"></script>
<script src="<?=__MAQ__?>admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?=__MAQ__?>admin/js/bootstrap.js"></script>
<script src="<?=__MAQ__?>admin/js/joinable.js"></script>
<script src="<?=__MAQ__?>admin/js/resizeable.js"></script>
<script src="<?=__MAQ__?>admin/js/neon-api.js"></script>
<script src="<?=__MAQ__?>admin/js/jquery.validate.min.js"></script>
<script src="<?=__MAQ__?>admin/js/neon-login.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="<?=__MAQ__?>admin/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="<?=__MAQ__?>admin/js/neon-demo.js"></script>

</body>
</html>