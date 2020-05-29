<div class="content-wrapper">
<div class="page-content fade-in-up">
<div class="col-12">
<div class="page-header">
      <div class="ibox flex-1">
          <div class="ibox-body">
              <div class="flexbox">
                  <div class="flexbox-b">
                      <div class="ml-5 mr-5">
                          <img class="img-circle" src="<?php echo base_url(); echo $info['image'];?>" alt="image" width="110">
                      </div>
                      <div>
                          <h4><?=$info['fullname'];?></h4>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
              <div class="col-lg-5">
                  <div class="ibox">
                      <div class="ibox-body">
                          <h5 class="font-strong mb-4">Ümumi Məlumatlar</h5>
                          <div class="row mb-2">
                              <div class="col-6 text-muted">Ad Soyad : </div>
                              <div class="col-6"><?=$info['fullname'];?></div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-muted">İstifadəçi adı : </div>
                              <div class="col-6"><?=$info['username'];?></div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-muted">Yaş : </div>
                              <div class="col-6"><?=$info['age'];?></div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-muted">Vəzifə : </div>
                              <div class="col-6"><?=$info['position'];?></div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-muted">Şəhər : </div>
                              <div class="col-6"><?=$info['city'];?></div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-muted">Ünvan : </div>
                              <div class="col-6"><?=$info['adress'];?></div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-muted">Telefon : </div>
                              <div class="col-6"><?=$info['phone'];?></div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-6 text-muted">Email : </div>
                              <div class="col-6"><?=$info['email'];?></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-7">
                  <div class="ibox">
                      <div class="ibox-body">
                          <h5 class="font-strong mb-4">Tərcümeyi-Hal</h5>
                          <p><?=$info['info'];?></p>
                      </div>
                  </div>
              </div>
          </div>
    </div>
</div>