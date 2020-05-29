<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url('assets/front/');?>images/favicon.png" type="image/x-icon">
    <title>ADMİN PANEL</title>
    <link href="<?=base_url('assets/back/');?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/morris.js/morris.css" rel="stylesheet" />
    <link href="<?=base_url('assets/back/');?>assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="<?=base_url('assets/back/');?>assets/css/main.min.css" rel="stylesheet"/>
</head>
<body class="fixed-navbar">
    <?php $info = session('read','admininfo');?>
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a href="<?=linkto('admin');?>">
                    <span class="brand">ADMiN PANEL</span>
                    <span class="brand-mini">AP</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                    </li>
                </ul>
                 <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <span><?php echo $info->fullname;?></span>
                            <img src="<?php echo base_url(); echo $info->image;?>"/>
                        </a>
                        <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu">
                            <div class="dropdown-arrow"></div>
                            <div class="dropdown-header">
                                <div class="admin-avatar">
                                    <img src="<?php echo base_url(); echo $info->image;?>"/>
                                </div>
                                <div>
                                    <h5 class="font-strong text-white"><?php echo $info->fullname;?></h5>
                                    <div>
                                        <span class="admin-badge"><i class="ti-user mr-2"></i>
                                            <?php if($info->permission==0){ ?>
                                                birinci admin
                                            <?php } elseif($info->permission==1){ ?>
                                                ikinci admin
                                            <?php } elseif($info->permission==2){ ?>
                                                üçüncü admin
                                            <?php } elseif($info->permission==3){ ?>
                                                dördüncü admin
                                            <?php } ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="admin-menu-features">
                                <a class="admin-features-item" href="<?=linkto('admin/profile');?>"><i class="ti-user"></i>
                                    <span>HESABIM</span>
                                </a>
                                <a class="admin-features-item" href="<?=linkto('admin/message');?>"><i class="ti-email"></i>
                                    <span>MESAJLAR</span>
                                </a>
                                <?php if($info->permission!=0){ ?>
                                <a style="display:none;" class="admin-features-item" href="<?=linkto('admin/settings');?>"><i class="ti-settings"></i>
                                    <span>PARAMETRLƏR</span>
                                </a>
                                <?php } else { ?>
                                <a class="admin-features-item" href="<?=linkto('admin/settings');?>"><i class="ti-settings"></i>
                                    <span>PARAMETRLƏR</span>
                                </a>
                                <?php } ?>
                            </div>
                            <div class="admin-menu-content">
                                <div class="d-flex justify-content-between mt-2">
                                    <a class="d-flex align-items-center" href="<?=base_url('admin/close');?>">ÇIXIŞ<i class="ti-shift-right ml-2 font-20"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>