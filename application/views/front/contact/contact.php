<?php $this->load->view('front/include/header');?>
<?php $this->load->view('front/include/slider');?>

    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">   
          <div class="col-md-12 col-lg-8 mb-5">
            
            <form autocomplete="off" action="<?php echo base_url('home/send_message');?>" method="post" class="p-5 bg-white">
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">AD SOYAD</label>
                  <input type="text" name="fullname" class="form-control" placeholder="ad soyadınızı yazın">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">EMAİL</label>
                  <input type="email" name="email" class="form-control" placeholder="emailinizi yazın">
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">TELEFON</label>
                  <input type="number" minlength="10" name="phone" class="form-control" placeholder="mobil nömrənizi yazın">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="hidden" name="ip" value="<?php echo getIP();?>">
                  <label class="font-weight-bold" for="message">MESAJINIZ</label> 
                  <textarea name="message" name="message" cols="30" rows="5" class="form-control" placeholder="mesajınızı yazın"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="GÖNDƏR" class="btn btn-primary text-white px-4 py-2">
                </div>
              </div> 

              <div class="row form-group">
                <div class="col-md-12">
                  <?php echo $this->session->flashdata('info'); ?>
                </div>
              </div>

            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">ƏLAQƏ VASİTƏLƏRİ</h3>
              <p class="mb-0 font-weight-bold">Ünvan</p>
              <p class="mb-4"><?=$info['adress'];?></p>
              <p class="mb-0 font-weight-bold">Telefon</p>
              <p class="mb-4"><a><?=$info['phone'];?></a></p>
              <p class="mb-0 font-weight-bold">Email</p>
              <p class="mb-0"><a><?=$info['email'];?></a></p>
            </div>        
          </div>
        </div>
      </div>
    </div>

<?php $this->load->view('front/include/footer.php');?>