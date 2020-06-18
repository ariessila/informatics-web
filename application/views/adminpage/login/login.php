<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?=$title?> | Upana Studio</title>
    <link rel="icon" href="<?=home_assets()?>img/ico.ico">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="<?=admin_assets()?>plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>css/animate.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>css/style.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>css/style-responsive.min.css" rel="stylesheet" />
    <link href="<?=admin_assets()?>css/theme/default.css" rel="stylesheet" id="theme" />
</head>
<body>
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <div class="login-cover">
        <div class="login-cover-image"><img src="<?=admin_assets()?>img/login-bg/bg-5.jpg" data-id="login-cover-image" alt="" /></div>
        <div class="login-cover-bg"></div>
    </div>
    <div id="page-container" class="fade">
        <div class="login login-v2" data-pageload-addclass="animated flipInX">
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> <a href="<?=site_url()?>">Upana Studio</a>
                    <small><?=$title?></small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <div class="login-content">
                <?=form_open(login_url(), array('class' => 'margin-bottom-0'))?>
                    <?=validation_errors('<div class="alert alert-danger fade in m-b-15">', '</div>')?>
                    <?=($this->session->flashdata('gagal') ? '<div class="alert alert-danger fade in m-b-15"><b>'.$this->session->flashdata('gagal').'</b></div>' : '')?>
                    <div class="form-group m-b-20">
                        <input type="text" name="username" class="form-control input-lg" placeholder="Username" />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" />
                    </div>
                    <div class="checkbox m-b-20">
                        <label>
                            <input type="checkbox" name="remember_me" value="1" /> Tetap Masuk
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" name="submit" class="btn btn-success btn-block btn-lg">Masuk</button>
                    </div>
                    <div class="m-t-20">
                        <a href="<?=login_url('forget')?>">Lupa Password?</a>
                    </div>
                <?=form_close()?>
            </div>
        </div>
    </div>

    <!--[if lt IE 9]>
        <script src="<?=admin_assets()?>crossbrowserjs/html5shiv.js"></script>
        <script src="<?=admin_assets()?>crossbrowserjs/respond.min.js"></script>
        <script src="<?=admin_assets()?>crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?=admin_assets()?>plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="<?=admin_assets()?>plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="<?=admin_assets()?>plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="<?=admin_assets()?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=admin_assets()?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=admin_assets()?>plugins/jquery-cookie/jquery.cookie.js"></script>
    <script src="<?=admin_assets()?>js/login-v2.demo.min.js"></script>
    <script src="<?=admin_assets()?>js/apps.min.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
            LoginV2.init();
        });
    </script>
</body>
</html>
