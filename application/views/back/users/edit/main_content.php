<div class="content-wrapper">
<div class="page-content fade-in-up">
	<div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">İstifadəçi Məlumatlarını Yeniləmə Formu</h3>
      </div>
      <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/user_edit');?>">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">İstifadəçi Şəkili</label>
            <div class="col-sm-10">
              <input type="file" name="image" class="form-control">
            </div>
          </div>

          <div class="form-group row">
             <label class="col-sm-2 col-form-label">Hal hazırda istifadəçinin şəkili</label>
             <div class="col-sm-10">
              <img src="<?php echo base_url(); echo $info['image']; ?>" style="height:150px;width:150px;object-fit:contain;">
             </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ad Soyad</label>
            <div class="col-sm-10">
              <input type="text" name="fullname" class="form-control" value="<?=$info['fullname'];?>">
              <input type="hidden" name="id" value="<?=$info['id'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">İstifadəçi Adı</label>
            <div class="col-sm-10">
              <input type="text" name="username" class="form-control" value="<?=$info['username'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Telefon</label>
            <div class="col-sm-10">
              <input type="number" name="phone" class="form-control" value="<?=$info['phone'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ünvan</label>
            <div class="col-sm-10">
              <input type="text" name="adress" class="form-control" value="<?=$info['adress'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Vəzifə</label>
            <div class="col-sm-10">
              <input type="text" name="position" class="form-control" value="<?=$info['position'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Yaş</label>
            <div class="col-sm-10">
              <input type="number" name="age" class="form-control" value="<?=$info['age'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Şəhər</label>
            <div class="col-sm-10">
              <input type="text" name="city" class="form-control" value="<?=$info['city'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" value="<?=$info['email'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Şifrə</label>
            <div class="col-sm-10">
              <input type="password" name="pass" class="form-control" placeholder="Yeni şifrə yazın">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hüquq No</label>
            <div class="col-sm-10">
              <select name="permission" class="form-control">
                 <?php if($info['permission']==0){ ?>
                   <option value="0" selected>Birinci</option>
                   <option value="1">İkinci</option>
                   <option value="2">Üçüncü</option>
                   <option value="3">Dördüncü</option>
                  <?php } elseif($info['permission']==1) { ?>
                    <option value="0">Birinci</option>
                    <option value="1" selected>İkinci</option>
                    <option value="2">Üçüncü</option>
                    <option value="3">Dördüncü</option>
                  <?php } elseif($info['permission']==2) { ?>
                    <option value="0">Birinci</option>
                    <option value="1">İkinci</option>
                    <option value="2" selected>Üçüncü</option>
                    <option value="3">Dördüncü</option>
                  <?php } elseif($info['permission']==3) { ?>
                    <option value="0">Birinci</option>
                    <option value="1">İkinci</option>
                    <option value="2">Üçüncü</option>
                    <option value="3" selected>Dördüncü</option>
                  <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tərcümeyi-Hal</label>
            <div class="col-sm-10">
               <textarea name="info" cols="30" rows="10" class="form-control">
                 <?php echo $info['info'];?>
               </textarea>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
          	  <a href="<?=base_url('admin/users');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
          	 Yenilə
          </button>
        </div>
      </form>
    </div>
</div>