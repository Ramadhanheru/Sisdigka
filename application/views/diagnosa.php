<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DIAGNOSA KENDARAAN MASUK</h1>
          </div>

          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-3 mb-4">
              <div class="card border-bottom-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Kendaraan Masuk</div>
                      <div class="h5 mb-2 font-weight-bold text-gray-800">
                         <?php
                         $no=1;
                         foreach($query->result() as $q) { ?>
                          <?= $q->tipe; ?>

                       </div>

                       <div class="h5 mb-2 font-weight-bold text-gray-700">
                        <?= $q->no_polisi; ?>
                       </div>

                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                          <a class="btn btn-sm btn-warning"  href="<?= base_url('Mekanik/proses_diagnosa/').$q->id_kendaraan; ?>">Proses Diagnosa</a>
                        </div>
                         <?php }  ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-motorcycle fa-5x text-gray-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">tabel diagnosa kendaraan masuk</h6>
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
                      <th>Mekanik</th>
                      <th>Nama Stnk</th>
                      <th>Nama Pembawa</th>
                      <th>Tanggal</th>
                      <th>Alamat</th>
                      <th>No Hp</th>
                      <th>No Polisi</th>
                      <th>No Mesin</th>
                      <th>Tipe</th>
                      <th>Km</th>
                      <th>Status</th>
                   
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Mekanik</th>
                      <th>Nama Stnk</th>
                      <th>Nama Pembawa</th>
                      <th>Tanggal</th>
                      <th>Alamat</th>
                      <th>No Hp</th>
                      <th>No Polisi</th>
                      <th>No Mesin</th>
                      <th>Tipe</th>
                      <th>Km</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
                         $no=1;
                         foreach($query->result() as $q) { ?>
                        
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $q->nama; ?></td>
                          <td><?= $q->nama_stnk ?></td>
                          <td><?= $q->nama_pembawa ?></td>
                          <td><?= $q->tanggal ?></td>
                          <td><?= $q->alamat ?></td>
                          <td><?= $q->no_hp ?></td>
                          <td><?= $q->no_polisi ?></td>
                          <td><?= $q->no_mesin ?></td>
                          <td><?= $q->tipe ?></td>
                          <td><?= $q->km ?></td>
                          <td><?php if ( $q->status != 0) { ?>
                            <a class="btn btn-sm btn-info" href="<?= base_url('').$q->id_kendaraan; ?>">Selesai</a>
                          <?php }else { ?>
                            <a class="btn btn-sm btn-warning"  href="<?= base_url('').$q->id_kendaraan; ?>">Sedang Diagnosa</a>
                         <?php } ?></td> 
                          
                        
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