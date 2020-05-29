<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">Protein Əlavə Etmə Formu</h3>
      </div>
      <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/vitamin_insert');?>">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Protein Adı</label>
            <div class="col-sm-10">
              <input type="text" name="protein_name" class="form-control" placeholder="Protein Adını Yazın">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Proteinin Qiyməti</label>
            <div class="col-sm-10">
              <input type="text" name="price" class="form-control" placeholder="Proteinin Qiymətini Yazın">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Protein Şəkili</label>
            <div class="col-sm-10">
              <input type="file" name="image" class="form-control">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Protein Haqqında</label>
            <div class="col-sm-10">
              <textarea name="info" cols="30" rows="10" class="form-control" placeholder="İstifadə qaydası və Tərkibi haqqında məlumat yazın"></textarea>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	 <a href="<?=base_url('admin/vitaminler');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 Əlavə Et
          </button>
        </div>
      </form>
    </div>
</div>