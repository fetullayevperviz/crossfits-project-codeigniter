<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Crossfits</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?=base_url('assets/front/');?>images/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/front/');?>fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?=base_url('assets/front/');?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/front/');?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?=base_url('assets/front/');?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?=base_url('assets/front/');?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/front/');?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/front/');?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?=base_url('assets/front/');?>css/animate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/front/');?>fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?=base_url('assets/front/');?>css/aos.css">
    <link rel="stylesheet" href="<?=base_url('assets/front/');?>css/style.css">
  </head>
  <body style="background-image: url(<?=base_url('assets/front/');?>'images/bg.jpg');">
  <div class="site-wrap">
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    <div class="site-navbar-wrap js-site-navbar bg-white">
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="<?=base_url();?>"><strong><?=$info['site_name'];?></strong></a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                      <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        <li><a href="<?=base_url();?>">BAŞ SƏHİFƏ</a></li>
                        <li><a href="<?=base_url('home/programs');?>">PROQRAMLAR</a></li>
                        <li class="has-children">
                        <a>PROTEİNLƏR</a>
                          <ul class="dropdown arrow-top">
                              <?php $menu = protein_sub_menu(); foreach ($menu as $info): ?>
                                   <li><a href="<?php echo base_url('home/'.$info['link'].'');?>"><?=$info['menu_name'];?></a></li>
                              <?php endforeach ?>
                          </ul>
                        </li>
                        <li><a href="<?=base_url('home/gallery');?>">QALEREYA</a></li>
                        <li><a href="<?=base_url('home/triners');?>">TRİNER</a></li>
                        <li><a href="<?=base_url('home/contact');?>">ƏLAQƏ</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>