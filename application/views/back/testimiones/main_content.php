<div class="content-wrapper">
<div class="page-content fade-in-up">
          <div class="col-12">
          <?php echo $this->session->flashdata('status');?>
          <div class="card">
              <div class="card-header">
              <h3 class="card-title">Slider Listi</h3>
              <a href="<?=base_url('admin/testimiones_add');?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;Əlavə Et</a>
          </div>  
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Şəkil</th>
                  <th class="text-center">Ad Soyad</th>
                  <th class="text-center">Haqqında</th>
                  <th class="text-center">Aktiv / Passiv</th>
                  <th class="text-center">Əməliyyatlar</th>
                </tr>
                </thead>
                <tbody>
                  <?php $num = 1; foreach ($info as $info): ?>
                     <tr class="text-center">
                        <td><?= $num++;?></td>
                        <td><img src="<?php echo base_url(); echo $info['image']; ?>" style="height:120px;width:100px;object-fit:contain;"></td>
                        <td><?= $info['fullname'];?></td>
                        <td><?= substr($info['info'], 0,20);?></td>
                        <td>
                           <?php if($info['status']==1){ ?>
                              <button class="btn btn-success">Aktiv</button>
                           <?php } else { ?>
                              <button class="btn btn-danger">Passiv</button>
                           <?php } ?>
                        </td>
                        <td>
                          <a href="<?=base_url('admin/testimiones_update/'.$info["id"].'');?>">
                            <button type="button" class="btn btn-success" name="button">Yenilə</button>
                          <a href="<?=base_url('admin/testimiones_delete/'.$info["id"].'/id/testimiones');?>">
                            <button type="button" class="btn btn-danger" name="button">Sil</button>
                          </a>
                        </td>
                      </tr>
                   <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
</div>