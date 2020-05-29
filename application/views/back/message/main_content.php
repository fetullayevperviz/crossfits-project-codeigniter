<div class="content-wrapper">
<div class="page-content fade-in-up">
 <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata('status');?>
      <div class="card">
        <div class="card-header">
          <h3>Mesaj Listi</h3>
        </div>
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-striped table-responsive">
            <thead>
            <tr class="text-center">
              <th class="text-center">No</th>
              <th class="text-center">Ad Soyad</th>
              <th class="text-center">Email</th>
              <th class="text-center">Telefon</th>
              <th class="text-center">Tarix</th>
              <th class="text-center">Mesajı Oxu</th>
              <th class="text-center">Əməliyyatlar</th>
            </tr>
            </thead>
            <tbody>
               <?php $num = 1; foreach ($info as $info): ?>
                   <tr class="text-center">
                      <td><?= $num++;?></td>
                      <td><?= $info['fullname'];?></td>
                      <td><?= $info['email'];?></td>
                      <td><?= $info['phone'];?></td>
                      <td><?= $info['m_date'];?></td>
                      <td>
                        <?php if($info['status']==1){ ?>
                          <a class="btn btn-success" style='color:white;'>Oxundu</a>
                        <?php } else { ?>
                          <a class="btn btn-danger" style='color:white;'>Oxunmadı</a>
                        <?php } ?>
                      </td>
                      <td>
                        <a href="<?=base_url('admin/message_read/'.$info["id"].'');?>">
                          <button type="button" class="btn btn-success" name="button">Mesajı Oxu</button>
                        <a href="<?=base_url('admin/message_delete/'.$info["id"].'/id/message');?>">
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
</div>