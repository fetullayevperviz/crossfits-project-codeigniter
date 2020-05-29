<?php $this->load->view('front/include/header');?>

    <div class="container">
      <div class="row justify-content-center mt-5 bg-dark" style="height:40px;border-radius:6px;">
         <h3 class="text-white font-weight-bold" style="line-height:40px;"><?=$program['program_name'];?></h3>
      </div>
    </div>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 float-left">
            <div class="media-with-text mb-5">
              <div class="mb-4">
                  <img src="<?php echo base_url(); echo $program['tmb'];?>" alt="<?=$program['program_name'];?>" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-9 mb-5 mb-lg-0 float-left">
              <p class="pl-5"><?=$program['info'];?></p>
          </div>
        </div>      
      
    </div>
  </div>
    <?php $this->load->view('front/include/footer');?>