<?php $this->load->view('front/include/header');?>
<?php $this->load->view('front/include/slider');?>
    <?php $programs = programs(); foreach($programs as $programs){ ?>
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <p class="mb-5">
              <img src="<?php echo base_url(); echo $programs['tmb'];?>" alt="<?=$programs['program_name'];?>" class="img-fluid rounded">
            </p>
          </div>
          <div class="col-lg-5 ml-auto">
            <h2 class="site-section-heading mb-3"><?=$programs['program_name'];?></h2>
            <p><?=word_limiter($programs['info'],60);?></p>
            <p><a href="<?php echo base_url('home/program_details/'); echo $programs['sef'];?>" class="btn btn-outline-primary py-2 px-4">ətraflı oxu &raquo;</a></p>
          </div>
        </div>
      </div>
    </div>
   <?php } ?>

<?php $this->load->view('front/include/footer');?>