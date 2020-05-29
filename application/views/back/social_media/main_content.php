<div class="content-wrapper">
<div class="page-content fade-in-up">
          <div class="col-12">
          <?php echo $this->session->flashdata('status');?>
          <div class="card">
              <div class="card-header">
              <h3 class="card-title">Sosial Şəbəkə Listi</h3>
              <a href="<?=base_url('admin/social_add');?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;Əlavə Et</a>
          </div>  
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Adı</th>
                  <th>Linki</th>
                  <th>İkonu</th>
                  <th class="text-center">Aktiv / Passiv</th>
                  <th class="text-center">Əməliyyatlar</th>
                </tr>
                </thead>
                <tbody>
                  <?php $num = 1; foreach ($info as $info): ?>
                     <tr>
                        <td class="text-center"><?= $num++;?></td>
                        <td><?= $info['title'];?></td>
                        <td><?= $info['link'];?></td>
                        <td><?= $info['icon'];?></td>
                        <td class="text-center">
                           <?php if($info['status']==1){ ?>
                              <button class="btn btn-success">Aktiv</button>
                           <?php } else { ?>
                              <button class="btn btn-danger">Passiv</button>
                           <?php } ?>
                        </td>
                        <td class="text-center">
                          <a href="<?=base_url('admin/social_update/'.$info["id"].'');?>">
                            <button type="button" class="btn btn-success" name="button">Yenilə</button>
                          <a href="<?=base_url('admin/social_delete/'.$info["id"].'/id/social_media');?>">
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