<?php $this->load->view('front/include/header');?>
<?php $this->load->view('front/include/slider');?>

    <div class="container">
      <div class="row justify-content-center mt-4 bg-dark" style="height:50px;border-radius:6px;">
        <h3 class="text-danger" style="font-weight:bold;line-height:50px;">AMİN TURŞULARI</h3>
      </div>
    </div>

   <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <?php $amin_tursulari = amin_tursulari(); foreach($amin_tursulari as $amin_tursulari){ ?>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="media-with-text mb-5 text-center">
              <div class="mb-4">
                <a href="<?php echo base_url('home/amin_tursulari_details/'); echo $amin_tursulari['sef'];?>">
                  <img style="height:200px;width:200px;" src="<?php echo base_url(); echo $amin_tursulari['tmb'];?>" alt="<?=$amin_tursulari['protein_name'];?>" class="img-fluid">
                </a>
              </div>
              <h2 class="h5 mb-2"><a href="<?php echo base_url('home/amin_tursulari_details/'); echo $amin_tursulari['sef'];?>"><?=$amin_tursulari['protein_name'];?></a></h2>
              <p><?=$amin_tursulari['price'];?> AZN</p>
              <p><a href="<?php echo base_url('home/amin_tursulari_details/'); echo $amin_tursulari['sef'];?>" class="btn btn-warning">ətraflı oxu &raquo;</a></p>
            </div>
          </div>
         <?php } ?>
        </div>
        </div>       
      </div>

<?php $this->load->view('front/include/footer');?>