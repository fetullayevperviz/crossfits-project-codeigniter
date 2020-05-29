<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="site-section-heading text-center">Son Proqramlar</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-13 nav-direction-white">
            <div class="nonloop-block-13 owl-carousel">
            <?php $son_programlar = son_programlar(); foreach ($son_programlar as $program){ ?>
              <div class="media-image">
                <img src="<?php echo base_url(); echo $program['tmb'];?>" alt="<?=$program['program_name'];?>" class="img-fluid">
                <div class="media-image-body">
                  <h2><?=$program['program_name'];?></h2>
                  <p><?=word_limiter($program['info'],5);?></p>
                  <p><a href="<?php echo base_url('home/program_details/'); echo $program['sef'];?>" class="btn btn-primary text-white px-4"><span class="caption">ətraflı oxu &raquo;</span></a></p>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>