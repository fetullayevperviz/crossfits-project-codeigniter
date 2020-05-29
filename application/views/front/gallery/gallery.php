<?php $this->load->view('front/include/header');?>
<?php $this->load->view('front/include/gallery_slider');?>  

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <?php $gallery = gallery(); foreach($gallery as $gallery){ ?>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="media-with-text mb-5">
              <div class="mb-4">
                  <img src="<?php echo base_url(); echo $gallery['tmb'];?>" style="height:350px;width:350px;" class="img-fluid">
              </div>
            </div>
          </div>
         <?php } ?>
      </div>
    </div>
<?php $this->load->view('front/include/footer');?>