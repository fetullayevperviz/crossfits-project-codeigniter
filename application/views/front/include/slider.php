
<div class="slide-one-item home-slider owl-carousel">
  <?php $slider = slider(); foreach ($slider as $info){ ?>
  <div class="site-blocks-cover inner-page" style="background-image: url(<?php echo base_url(); echo $info['image'];?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade">
          <h1><?=$info['image_text1'];?></h1>
          <span class="caption d-block text-white"><?=$info['image_text2'];?></span>
        </div>
      </div>
  </div>  
<?php } ?>
</div>