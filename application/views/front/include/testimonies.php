    <div class="site-section block-14 bg-light nav-direction-white">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="site-section-heading text-center">Şəhadətnamələr</h2>
          </div>
        </div>
        <div class="nonloop-block-14 owl-carousel">
          <?php $testimiones = testimiones(); foreach($testimiones as $testimiones){ ?>
          <div class="p-5">
            <div class="d-flex block-testimony">
              <div class="person mr-3">
                <img src="<?php echo base_url(); echo $testimiones['tmb'];?>" alt="<?=$testimiones['fullname'];?>" class="img-fluid rounded-circle">
              </div>
              <div>
                <h2 class="h5"><?=$testimiones['fullname'];?></h2>
                <blockquote>&ldquo;<?=word_limiter($testimiones['info'],20);?>&rdquo;</blockquote>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>    
    </div>