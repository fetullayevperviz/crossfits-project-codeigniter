<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="row">
     <div class="col-md-12">
          <div class="ibox ibox-fullheight bg-dark text-white">
              <div class="ibox-head">
                  <div class="ibox-title">Qeydiyyat Formu</div>
              </div>
              <form class="form-info" autocomplete="off" method="POST" action="<?=linkto('admin/qeydiyyat_insert');?>">
                  <div class="ibox-body">
                      <div class="row">
                          <div class="col-sm-6 form-group mb-4">
                              <label>Ad Soyad Ata Adı</label>
                              <input class="form-control" type="text" placeholder="ad soyad ata adı yazın" name="fullname">
                          </div>
                          <div class="col-sm-6 form-group mb-4">
                              <label>Məbləğ</label>
                              <input class="form-control" name="quantity" type="number" placeholder="məbləği daxil edin">
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 form-group mb-4">
                          <label>Giriş Tarixi</label>
                          <input class="form-control" type="date" name="start_date" placeholder="başlama tarixini yazın">
                      </div>
                      <div class="col-sm-6 form-group mb-4">
                          <label>Bitiş Tarixi</label>
                          <input class="form-control" type="date" name="end_date" placeholder="bitiş tarixini yazın">
                      </div>
                      </div>
                      <div class="form-group mb-0">
                          <label>Cins</label>
                          <div>
                              <label class="radio radio-inline radio-info">
                                  <input type="radio" name="gender" checked="" value="1">
                                  <span class="input-span"></span>Kişi</label>
                              <label class="radio radio-inline radio-info">
                                  <input type="radio" name="gender" value="0">
                                  <span class="input-span"></span>Qadın</label>
                          </div>
                      </div>
                  </div>
                  <div class="ibox-footer">
                      <a href="<?=linkto('admin/qeydiyyat');?>" class="btn btn-primary text-white mr-3" type="button">Geri Qayıt</a>
                      <button class="btn btn-info mr-2" type="submit">Qeydiyyat</button>
                  </div>
              </form>
          </div>
      </div> 
  </div>
</div>