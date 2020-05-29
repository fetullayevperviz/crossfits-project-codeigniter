<div class="content-wrapper">
<div class="page-content fade-in-up">
          <div class="col-12">
          <?php echo $this->session->flashdata('status');?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Qeydiyyat Siyahısı</h3>
               <a href="<?=base_url('admin/vaxti_bitenler');?>" class="btn btn-primary mr-2" style="margin-left:750px;"><i class="fa fa-user"></i>&nbsp;&nbsp;Vaxtı Bitənlər</a>
               <a href="<?=base_url('admin/qeydiyyat_add');?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;Qeydiyyat</a>
            </div>
            
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Ad Soyad Ata Adı</th>
                  <th class="text-center">Cins</th>
                  <th class="text-center">Məbləğ (AZN)</th>
                  <th class="text-center">Başlama Tarixi</th>
                  <th class="text-center">Bitiş Tarixi</th>
                  <th class="text-center">Yenilə</th>
                </tr>
                </thead>
                <tbody>
                    <?php $num=1; foreach ($info as $info): ?>
                      <tr class="text-center">
                          <td><?=$num++;?></td>
                          <td><?= $info['fullname'];?></td>
                          <td>
                             <?php if($info['gender']==0)
                             {  
                               echo 'Qadın';
                             }
                             else 
                             {
                                echo 'Kişi';
                             }
                            ?>
                          </td>
                          <td><?= $info['quantity'];?> AZN</td>
                          <td><?= $info['start_date'];?></td>
                          <td>
                            <?php if($info['end_date'] > date('Y-m-d')) 
                                  { 
                                    echo $info['end_date'];
                                  }
                                  else
                                  { ?>
                                     <span class="text-danger font-weight-bold">Vaxt Bitdi</span>
                                 <?php } 
                            ?>
                          </td>
                          <td>
                            <a href="<?=base_url('admin/qeydiyyat_update/'.$info['id'].'');?>">
                              <button type="button" class="btn btn-success" name="button">Yenilə</button>
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