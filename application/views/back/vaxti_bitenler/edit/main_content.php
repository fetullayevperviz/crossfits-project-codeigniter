<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Qeydiyyat Yeniləmə Formu</h3>
      </div>
      <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/qeydiyyat_edit');?>">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ad Soyad Ata Adı</label>
            <div class="col-sm-10">
              <input type="text" name="fullname" class="form-control" value="<?=$info['fullname'];?>">
              <input type="hidden" name="id" value="<?=$info['id'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Məbləğ</label>
            <div class="col-sm-10">
              <input type="number" name="quantity" class="form-control" value="<?=$info['quantity'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Başlama Tarixi</label>
            <div class="col-sm-10">
              <input type="date" name="start_date" class="form-control" value="<?=$info['start_date'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Bitiş Tarixi</label>
            <div class="col-sm-10">
              <input type="date" name="end_date" class="form-control" value="<?=$info['end_date'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Cins</label>
            <div class="col-sm-10">
              <select name="gender" class="form-control">
                 <?php if($info['gender']==0){ ?>
                   <option value="0" selected>Qadın</option>
                   <option value="1">Kişi</option>
                  <?php } elseif($info['gender']==1) { ?>
                    <option value="0">Qadın</option>
                    <option value="1" selected>Kişi</option>
                  <?php } ?>
              </select>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	  <a href="<?=base_url('admin/vaxti_bitenler');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 Yenilə
          </button>
        </div>
      </form>
    </div>
</div>