<div class="content-wrapper">
<div class="page-content fade-in-up">
    <div class="card card-info bg-dark text-white">
      <div class="card-header">
        <h3 class="card-title">Protein Yeniləmə Formu</h3>
      </div>
      <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url('admin/vitamin_edit');?>">
        <div class="card-body">
          
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Protein Şəkili</label>
            <div class="col-sm-10">
              <input type="file" name="image" class="form-control">
            </div>
          </div>

          <div class="form-group row">
             <label class="col-sm-2 col-form-label">Hal hazırda mövcud şəkil</label>
             <div class="col-sm-10">
              <img src="<?php echo base_url(); echo $info['image']; ?>" style="height:150px;width:150px;object-fit:contain;">
             </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Protein Adı</label>
            <div class="col-sm-10">
              <input type="text" name="protein_name" class="form-control" value="<?=$info['protein_name'];?>">
              <input type="hidden" name="id" value="<?=$info['id'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Proteinin Qiyməti</label>
            <div class="col-sm-10">
              <input type="text" name="price" class="form-control" value="<?=$info['price'];?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Protein Haqqında</label>
            <div class="col-sm-10">
              <textarea name="info" cols="30" rows="10" class="form-control"><?=$info['info'];?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Aktiv / Passiv</label>
            <div class="col-sm-10">
              <select name="status" class="form-control">
                 <?php if($info['status']==1){ ?>
                   <option value="1" selected>Aktiv</option>
                   <option value="0">Passiv</option>
                  <?php } elseif($info['status']==0) { ?>
                    <option value="1">Aktiv</option>
                    <option value="0" selected>Passiv</option>
                  <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
              <a href="<?=base_url('admin/vitaminler');?>" style="color:white;">Geri Qayıt</a>
          </button>
          <button type="submit" class="btn btn-success float-right">
             Yenilə
          </button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
</div>