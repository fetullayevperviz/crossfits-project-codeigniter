<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Giriş Səhifəsi</title>
    <link href="<?=base_url('assets/back/');?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/css/main.min.css" rel="stylesheet" />
    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url(<?=base_url('assets/back/');?>assets/img/blog/19.jpg);
        }

        .cover {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(117, 54, 230, .1);
        }

        .auth-head-icon {
            position: relative;
            height: 60px;
            width: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            background: rgba(0, 0, 0, .6);
            color: #fff;
            box-shadow: 0 5px 20px #d6dee4;
            border-radius: 50%;
            z-index: 2;
        }

        .login-box {
            background: rgba(0, 0, 0, .6);
            color: rgba(255, 255, 255, .8);
        }

        .login-box .form-control {
            background-color: transparent;
            border-color: rgba(255, 255, 255, .6);
            color: #fff;
        }

        .login-box .form-control:focus {
            border-color: rgba(255, 255, 255, 1);
        }
    </style>
</head>
<body>
    <div class="cover"></div>
    <div style="max-width: 400px;margin: 100px auto 50px;">
        <?php echo flash_read();?>
        <div class="text-center mb-5">
            <span class="auth-head-icon"><i class="la la-user"></i></span>
        </div>
        <div class="ibox login-box">
            <form class="ibox-body" id="login-form" action="<?=base_url('login/loginto');?>" method="POST">
                <h4 class="font-strong text-center mb-5">Giriş</h4>
                <div class="form-group mb-4">
                    <input required class="form-control form-control-line" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group mb-4">
                    <input required class="form-control form-control-line" type="password" name="password" placeholder="Şifrə">
                </div>
                <div class="text-center mb-4">
                    <button type="submit" class="btn btn-primary btn-rounded btn-block">Giriş</button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?=base_url('assets/back/');?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url('assets/back/');?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url('assets/back/');?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/back/');?>assets/vendors/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?=base_url('assets/back/');?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url('assets/back/');?>assets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
    <script src="<?=base_url('assets/back/');?>assets/vendors/toastr/toastr.min.js"></script>
    <script src="<?=base_url('assets/back/');?>assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?=base_url('assets/back/');?>assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?=base_url('assets/back/');?>assets/js/app.min.js"></script>
</body>
</html>