<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DIAGNOSA KENDARAAN</h1>
          </div>


         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">tabel Jenis kerusakan</h6>
            </div>
            <div class="card-body">
            <?= $this->session->flashdata('message');?>
          <div> 
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add" style="margin-bottom: 10px;"> 
              Tambah Jenis Kerusakan
            </button>
           
              
            <div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Kerusakan</th>
                      <th>Jenis kerusakan</th>
                      <th>Solusi</th>
                      <th>Opsi  </th>
                   
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kode Kerusakan</th>
                      <th>Jenis kerusakan</th>
                      <th>Solusi</th>
                      <th>Opsi  </th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
                         $no=1;
                         foreach($query->result() as $q) { ?>
                        
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $q->kode_kerusakan; ?></td>
                          <td><?= $q->jenis_kerusakan; ?></td>
                          <td><textarea name="solusi" class="form-control" id="solusi" rows="3" readonly=""><?= $q->solusi; ?></textarea></td>
                          <td><a href="#" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#edit-<?= $q->id_jenis_kerusakan;?>" title="Edit Jenis Kerusakan" ><i class="fas fa-edit"></i> </a> &nbsp; <a href=" <?= $q->id_jenis_kerusakan; ?> " class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#delete-<?= $q->id_jenis_kerusakan;?>" title="hapus Jenis Kerusakan"><i class="fas fa-trash"></i> </a> </td>
                        
                        </tr>

                         <!-- Modal -->
                  <div class="modal fade" id="edit-<?= $q->id_jenis_kerusakan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Jenis Kerusakan</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                        </div>

                        <form action="<?php echo base_url()?>welcome/edit_jenis_kerusakan" method="POST">
                        <input type="hidden" name="id_jenis_kerusakan" value="<?= $q->id_jenis_kerusakan;?>">
                          <div class="modal-body">

                            <div class="form-group">
                              <label for="kode_kerusakan">Kode Kerusakan:</label>
                              <input type="text" name="kode_kerusakan" class="form-control" id="kode_kerusakan" value="<?= $q->kode_kerusakan; ?>">
                            </div>
                            <div class="form-group">
                              <label for="jenis_kerusakan">Jenis Kerusakan:</label>
                              <input type="text" name="jenis_kerusakan" class="form-control" id="jenis_kerusakan" value="<?= $q->jenis_kerusakan; ?>">
                            </div>
                            <div class="form-group">
                              <label for="solusi">Solusi:</label>
                             <textarea name="solusi" class="form-control" id="solusi" rows="3" value="<?= $q->solusi; ?>"><?= $q->solusi; ?></textarea>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>


                  <!-- Modal -->
                  <div class="modal fade" id="delete-<?= $q->id_jenis_kerusakan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Jenis Kerusakan</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                        </div>

                        <form action="<?php echo base_url()?>welcome/hapus_jenis_kerusakan" method="POST">
                          <div class="modal-body">
                            <h5>Are You Sure You Want To Delete This Data?</h5>
                            <input type="hidden" name="id_jenis_kerusakan" value="<?= $q->id_jenis_kerusakan;?>">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

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


      <!-- Modal -->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah jenis Kerusakan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>

        <form class="needs-validation" action="<?= base_url()?>welcome/tambah_jenis_kerusakan" method="POST" >
          <div class="modal-body">

           <div class="form-group">
            <label for="kode_kerusakan">Kode Kerusakan:</label>
            <input type="text" name="kode_kerusakan" class="form-control" id="kode_kerusakan" required="">
                            </div>
            <div class="form-group">
            <label for="jenis_kerusakan">Jenis Kerusakan:</label>
            <input type="text" name="jenis_kerusakan" class="form-control" id="jenis_kerusakan" required="">
                            </div>
            <div class="form-group">
            <label for="solusi">Solusi:</label>
            <textarea name="solusi" class="form-control" id="solusi" rows="3" required=""></textarea>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>