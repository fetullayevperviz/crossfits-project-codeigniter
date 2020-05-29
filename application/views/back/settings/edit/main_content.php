<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">Site Parametrlərini Yeniləmə Formu</h3>
      </div>
      <form class="form-horizontal" method="POST" action="<?=base_url('admin/settings_edit');?>">
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Site Adı</label>
            <div class="col-sm-10">
              <input type="text" name="site_name" class="form-control" value="<?=$info['site_name'];?>">
              <input type="hidden" name="id" value="<?=$info['id'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Site Url</label>
            <div class="col-sm-10">
              <input type="text" name="site_url" class="form-control" value="<?=$info['site_url'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Site Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" value="<?=$info['email'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Site Telefon</label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" value="<?=$info['phone'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Site Keyword</label>
            <div class="col-sm-10">
              <input type="text" name="site_keyword" class="form-control" value="<?= $info['site_keyword'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Site CopyRight Mətni</label>
            <div class="col-sm-10">
              <input type="text" name="copyright_text" class="form-control" value="<?= $info['copyright_text'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Site Ünvanı</label>
            <div class="col-sm-10">
              <textarea name="adress" class="form-control"><?=$info['adress'];?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Site Haqqında</label>
            <div class="col-sm-10">
              <textarea name="info" class="form-control"><?=$info['info'];?></textarea>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	  <a href="<?=base_url('admin/settings');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 Yenilə
          </button>
        </div>
      </form>
    </div>
</div>