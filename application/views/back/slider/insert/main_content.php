<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">Slider Əlavə Etmə Formu</h3>
      </div>
      <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/slider_insert');?>">
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">1.Slider Mətni</label>
            <div class="col-sm-10">
              <input type="text" name="image_text1" class="form-control" placeholder="Birinci Slider Mətnini Yazın">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">2.Slider Mətni</label>
            <div class="col-sm-10">
              <input type="text" name="image_text2" class="form-control" placeholder="İkinci Slider Mətnini Yazın">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Slider Şəkili</label>
            <div class="col-sm-10">
              <input type="file" name="image" class="form-control">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	 <a href="<?=base_url('admin/sliders');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 Əlavə Et
          </button>
        </div>
      </form>
    </div>
</div>