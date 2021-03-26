<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DIAGNOSA KENDARAAN MASUK</h1>
          </div>

         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">form diagnosa kendaraan masuk</h6>
            </div>
            <div class="card-body">
            <?= $this->session->flashdata('message');?>
          <div> 
            <div>
              <div class="table-responsive">
                <form method="post" action="<?= base_url('Mekanik/Diagnosa'); ?>">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                  <thead>
                    <tr>
                      <th>Kode Gejala</th>
                      <th>Gejala</th>
                      <th>Benar</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                         foreach($gejala->result() as $q) { ?>
                        
                        <tr>
                          <td><?= $q->kode_gejala ?></td>
                          <td><?= $q->gejala; ?></td>
                          <td><input type='checkbox' value="<?= $q->kode_gejala; ?>" name="kode_gejala[]" /></td>
                        
                        </tr>

                        <?php  } ?> 
                  
                  </tbody>
                </table>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                </form>
              </div>
            </div>
            </div>
          </div>



          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->