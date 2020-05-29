<?php $this->load->view('front/include/header');?>
<?php $this->load->view('front/include/triner_slider');?> 
    
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <?php $triner = triner(); foreach($triner as $triner){ ?>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="media-with-text mb-5">
              <div class="mb-4">
                <a href="<?php echo base_url('home/triner_info/'); echo $triner['sef'];?>">
                  <img src="<?php echo base_url(); echo $triner['tmb'];?>" alt="<?=$triner['fullname'];?>" class="img-fluid">
                </a>
              </div>
              <h2 class="h5 mb-2"><a href="<?php echo base_url('home/triner_info/'); echo $triner['sef'];?>"><?=$triner['fullname'];?></a></h2>
              <p><?=word_limiter($triner['info'],30);?></p>
              <p><a href="<?php echo base_url('home/triner_info/'); echo $triner['sef'];?>" class="btn btn-warning">ətraflı oxu &raquo;</a></p>
            </div>
          </div>
          <?php } ?> 
      </div>
    </div>

    <?php $this->load->view('front/include/footer');?>