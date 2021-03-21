<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">KENDARAAN MASUK</h1>
          </div>


         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">tabel kendaraan masuk</h6>
            </div>
            <div class="card-body">
            <?= $this->session->flashdata('message');?>
          <div> <a href=" <?=base_url('welcome/tambah_kendaraan') ?> " class="btn btn-info" style="margin-bottom: 10px;"> Tambah </a>
              
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
                      <th>Opsi  </th>
                   
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
                      <th>Opsi  </th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
                         $no=1;
                         foreach($query->result() as $q) { ?>
                        
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $q->id_user; ?></td>
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
                          <td><a href=" <?= base_url('welcome/').$q->id_kendaraan; ?> " class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i> </a> &nbsp; <a href=" <?= base_url('welcome/').$q->id_kendaraan; ?> " class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i> </a> </td>
                        
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