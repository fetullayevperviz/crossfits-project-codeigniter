<div class="slide-one-item home-slider owl-carousel">
  <?php $slider = gallery_slider(); foreach ($slider as $info){ ?>
  <div class="site-blocks-cover inner-page" style="background-image: url(<?php echo base_url(); echo $info['image'];?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  </div>  
<?php } ?>
</div>