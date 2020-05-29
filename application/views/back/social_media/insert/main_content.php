<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">Sosial Şəbəkə Əlavə Etmə Formu</h3>
      </div>
      <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/social_insert');?>">
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sosial Şəbəkə Adı</label>
            <div class="col-sm-10">
              <input type="text" name="title" class="form-control" placeholder="Sosial Şəbəkə Adını Yazın">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Link</label>
            <div class="col-sm-10">
              <input type="text" name="link" class="form-control" placeholder="Sosial Şəbəkə Linkini Yazın .. http:// ilə">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sosial Şəbəkə İkonu</label>
            <div class="col-sm-10">
              <input type="text" name="icon" class="form-control" placeholder="Sosial Şəbəkə İkonu Yazın">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	 <a href="<?=base_url('admin/social_media');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 Əlavə Et
          </button>
        </div>
      </form>
    </div>
</div>