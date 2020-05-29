   <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4 text-white">HAQQIMIZDA</h3>
            <p><?=$info['info'];?></p>
          </div>
          <div class="col-md-5 ml-auto">
            <div class="row">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">MENYU</h3>
                  <ul class="list-unstyled">
                    <li><a href="<?=base_url();?>">BAŞ SƏHİFƏ</a></li>
                    <li><a href="<?=base_url('home/programs');?>">PROQRAMLAR</a></li>
                    <li><a href="<?=base_url('home/gallery');?>">QALEREYA</a></li>
                    <li><a href="<?=base_url('home/triners');?>">TRİNERLƏR</a></li>
                    <li><a href="<?=base_url('home/contact');?>">ƏLAQƏ</a></li>
                  </ul>
              </div>
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">PROTEİNLƏR</h3>
                  <ul class="list-unstyled">
                    <?php $menu = protein_sub_menu(); foreach ($menu as $menu): ?>
                         <li><a href="<?php echo base_url('home/'.$menu['link'].'');?>"><?=$menu['menu_name'];?></a></li>
                    <?php endforeach; ?>
                  </ul>
              </div>
            </div>
          </div> 
          <div class="col-md-2">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">SOSİAL ŞƏBƏKƏLƏRİMİZ</h3></div>
              <div class="col-md-12">
                <p>
                    <?php $social = social_media(); foreach ($social as $s_info): ?>
                        <a href="<?=$s_info['link'];?>" class="pb-2 pr-2 pl-0">
                          <span class="icon-<?=$s_info['icon'];?>"></span>
                        </a>
                    <?php endforeach; ?>
                </p>
              </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              &copy; <?php echo date('Y:m:d'); echo $info['copyright_text'];?>
            </p>
          </div>     
        </div>
      </div>
    </footer>
  </div>
  <script src="<?=base_url('assets/front/');?>js/jquery-3.3.1.min.js"></script>
  <script src="<?=base_url('assets/front/');?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?=base_url('assets/front/');?>js/jquery-ui.js"></script>
  <script src="<?=base_url('assets/front/');?>js/popper.min.js"></script>
  <script src="<?=base_url('assets/front/');?>js/bootstrap.min.js"></script>
  <script src="<?=base_url('assets/front/');?>js/owl.carousel.min.js"></script>
  <script src="<?=base_url('assets/front/');?>js/jquery.stellar.min.js"></script>
  <script src="<?=base_url('assets/front/');?>js/jquery.countdown.min.js"></script>
  <script src="<?=base_url('assets/front/');?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?=base_url('assets/front/');?>js/bootstrap-datepicker.min.js"></script>
  <script src="<?=base_url('assets/front/');?>js/aos.js"></script>
  <script src="<?=base_url('assets/front/');?>js/main.js"></script>
  </body>
</html>