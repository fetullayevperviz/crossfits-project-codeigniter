<div class="content-wrapper">
<div class="page-content fade-in-up">
<div class="card card-info bg-dark text-white">
    <div class="card-header">
      <h3 class="card-title">Mesajları Oxuma Formu</h3>
    </div>
    <form class="form-horizontal" method="POST">
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Ad Soyad</label>
          <div class="col-sm-10">
            <input type="text" name="fullname" class="form-control" value="<?=$result['fullname'];?>">
            <input type="hidden" name="id" value="<?=$result['id'];?>">
            <input type="hidden" name="status" value="<?=$result['status'];?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" name="email" disabled class="form-control" value="<?=$result['email'];?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Telefon</label>
          <div class="col-sm-10">
            <input type="number" name="phone" disabled class="form-control" value="<?=$result['phone'];?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Yazılma Tarixi</label>
          <div class="col-sm-10">
            <input type="text" name="m_date" disabled class="form-control" value="<?=$result['m_date'];?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">ip Adresi</label>
          <div class="col-sm-10">
            <input type="text" name="ip" disabled class="form-control" value="<?=$result['ip'];?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Mesaj</label>
          <div class="col-sm-10">
            <textarea name="message" class="form-control"><?=$result['message'];?></textarea>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            <a href="<?=base_url('admin/message');?>" style="color:white;">Geri Qayıt</a>
        </button>
        <button type="submit" class="btn btn-danger" style="float:right;">
            <a href="mailto:<?php echo $result['email'];?>" style="color:white;">Cavab Yazın</a>
        </button>
      </div>
    </form>
  </div>
</div>