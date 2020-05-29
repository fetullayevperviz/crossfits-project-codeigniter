    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="site-section-heading text-center">Crossfit Məşqləri</h2>
          </div>
        </div>
        <div class="row">
        <div class="row mb-5">
          <?php $exercises = exercises(); foreach($exercises as $exercises){ ?>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="media-with-text mb-5">
              <div class="mb-4">
                  <img src="<?php echo base_url(); echo $exercises['tmb'];?>" class="img-fluid">
              </div>
            </div>
          </div>
        <?php } ?>
         </div>
        </div>
      </div>
    </div>

    