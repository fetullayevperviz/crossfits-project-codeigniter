<div class="content-wrapper">
<div class="page-content fade-in-up">
          <div class="col-12">
          <?php echo $this->session->flashdata('status');?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Site Parametrləri Listi</h3>
            </div>
            
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Site Adı</th>
                  <th>Ünvan</th>
                  <th>Email</th>
                  <th>Telefon</th>
                  <th>Yenilə</th>
                </tr>
                </thead>
                <tbody>
                       <tr class="text-center">
                          <td><?=1;?></td>
                          <td><?= $settings->site_name;?></td>
                          <td><?= $settings->adress;?></td>
                          <td><?= $settings->email;?></td>
                          <td style="width:15%;"><?= $settings->phone;?></td>
                          <td>
                            <a href="<?=base_url('admin/settings_update/'.$settings->id.'');?>">
                              <button type="button" class="btn btn-success" name="button">Yenilə</button>
                            </a>
                          </td>
                      </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
</div>