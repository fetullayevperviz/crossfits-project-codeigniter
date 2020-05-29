<div class="content-wrapper">
<div class="page-content fade-in-up">
          <div class="col-12">
          <?php echo $this->session->flashdata('status');?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Bu Günə Olan Qeydiyyat Siyahısı</h3>
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
                            <?php if($info['end_date'] < date('Y-m-d')) 
                                  { ?>
                                    <span class="text-danger font-weight-bold">Vaxt Bitdi</span>
                                 <?php } 
                                 else 
                                 {
                                    echo $info['end_date']; 
                                 } 
                            ?>
                          </td>
                      </tr>
                    <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
</div>