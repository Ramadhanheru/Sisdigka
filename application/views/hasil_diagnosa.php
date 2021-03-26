<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DIAGNOSA KENDARAAN MASUK</h1>
          </div>

          


         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Hasil Diagnosa</h6>
            </div>
            <div class="card-body">
            <?= $this->session->flashdata('message');?>
          <div> 
            <div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Kerusakan</th>
                      <th>Jenis Kerusakan</th>
                      <th>Detail</th>
                      
                   
                    </tr>
                  </thead>
                 
                  <tbody>
                     <?php
                         $no=1;
                         foreach($jenis_kerusakan->result() as $q) { ?>
                        
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $q->kode_kerusakan; ?></td>
                          <td><?= $q->jenis_kerusakan ?></td>
                          <td>
                            <a class="btn btn-sm btn-info" href="<?= base_url('').$q->id_jenis_kerusakan; ?>">Detail</a>
                        </td> 
                          
                        
                        </tr>

                        <?php $no++; } ?> 
                  
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>



          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->