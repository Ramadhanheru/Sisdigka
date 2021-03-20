<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">MEKANIK</h1>
          </div>


         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">tabel mekanik</h6>
            </div>
            <div class="card-body">
            <?= $this->session->flashdata('message');?>
          <div> <a href=" <?=base_url('welcome/t_user') ?> " class="btn btn-info" style="margin-bottom: 10px;"> Tambah </a>
              
            <div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Mekanik</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Role</th>
                      <th>Opsi  </th>
                   
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Mekanik</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Role</th>
                      <th>Opsi  </th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
                         $no=1;
                         foreach($query->result() as $q) { ?>
                        
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $q->nama; ?></td>
                          <td><?= $q->user ?></td>
                          <td><?= $q->password ?></td>
                          <td><?php if ( $q->role != 0) { ?>
                            <a class="btn btn-sm btn-success" href="<?= base_url('welcome/edit_user/').$q->id_user; ?>">Aktif</a>
                          <?php }else { ?>
                            <a class="btn btn-sm btn-danger"  href="<?= base_url('welcome/edit_userr/').$q->id_user; ?>">Tidak Aktif</a>
                         <?php } ?></td> 
                          <td><a href=" <?= base_url('welcome/e_user/').$q->id_user; ?> " class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i> </a> &nbsp; <a href=" <?= base_url('welcome/hapus_user/').$q->id_user; ?> " class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i> </a> </td>
                        
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