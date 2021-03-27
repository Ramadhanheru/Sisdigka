<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DIAGNOSA KENDARAAN</h1>
          </div>


         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Basis Pengetahuan</h6>
            </div>
            <div class="card-body">
            <?= $this->session->flashdata('message');?>
          <div> 
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add" style="margin-bottom: 10px;"> 
              Tambah Basis Pengetahuan
            </button>
           
              
            <div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kerusakan</th>
                      <th>Jenis Kerusakan</th>
                      <th>Kode Kerusakan</th>
                      <th>Kode Gejala</th>
                      <th>Opsi  </th>
                   
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kerusakan</th>
                      <th>Jenis Kerusakan</th>
                      <th>Kode Kerusakan</th>
                      <th>Kode Gejala</th>
                      <th>Opsi  </th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
                         $no=1;
                         foreach($query->result() as $q) { ?>
                        
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $q->kerusakan; ?></td>
                          <td><?= $q->jenis_kerusakan; ?></td>
                          <th><?= $q->kode_kerusakan; ?></th>
                          <td><?= $q->kode_gejala; ?></td>
                          <td><a href="#" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#edit-<?= $q->id;?>" title="Edit basis pengetahuan" ><i class="fas fa-edit"></i> </a> &nbsp; <a href=" <?= $q->id; ?> " class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#delete-<?= $q->id;?>" title="hapus basis pengetahuan"><i class="fas fa-trash"></i> </a> </td>
                        
                        </tr>

                         <!-- Modal -->
                  <div class="modal fade" id="edit-<?= $q->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit basis pengetahuan</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                        </div>

                        <form action="<?php echo base_url()?>welcome/edit_basis_pengetahuan" method="POST">
                        <input type="hidden" name="id" value="<?= $q->id;?>">
                          <div class="modal-body">

                            <div class="form-group">
                            <label for="id_kerusakan">Kerusakan:</label>
                            <select name="id_kerusakan" class="custom-select">
                                      <option value="<?= $q->id_kerusakan; ?>" selected><?= $q->kerusakan ?></option>
                                      <?php foreach ($query2->result() as $dr){ ?>
                                      <option value="<?= $dr->id_kerusakan; ?>"><?= $dr->kerusakan; ?></option>
                                      <?php  } ?>  
                                    </select>
                            <?= form_error('id_kerusakan','<small class="text-danger pl-3 ">','</small>');?>
                          </div>
                          <div class="form-group">
                            <label for="id_jenis_kerusakan">Jenis kerusakan:</label>
                            <select name="id_jenis_kerusakan" class="custom-select">
                                      <option value="<?= $q->id_jenis_kerusakan; ?>" selected><?= $q->jenis_kerusakan ?></option>
                                      <?php foreach ($query3->result() as $dr){ ?>
                                      <option value="<?= $dr->id_jenis_kerusakan; ?>"><?= $dr->jenis_kerusakan; ?></option>
                                      <?php  } ?>  
                                    </select>
                            <?= form_error('id_jenis_kerusakan','<small class="text-danger pl-3 ">','</small>');?>
                          </div>
                          <div class="form-group">
                            <label for="id_gejala">Gejala:</label>
                            <select name="id_gejala" class="custom-select">
                                      <option value="<?= $q->id_gejala; ?>" selected><?= $q->gejala ?></option>
                                      <?php foreach ($query4->result() as $dr){ ?>
                                      <option value="<?= $dr->id_gejala; ?>"><?= $dr->gejala; ?></option>
                                      <?php  } ?>  
                                    </select>
                            <?= form_error('id_gejala','<small class="text-danger pl-3 ">','</small>');?>
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
                  <div class="modal fade" id="delete-<?= $q->id_gejala; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus basis pengetahuan</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                        </div>

                        <form action="<?php echo base_url()?>welcome/hapus_basis_pengetahuan" method="POST">
                          <div class="modal-body">
                            <h5>Are You Sure You Want To Delete This Data?</h5>
                            <input type="hidden" name="id" value="<?= $q->id;?>">
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
          <h4 class="modal-title">Tambah basis pengetahuan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>

        <form class="needs-validation" action="<?= base_url()?>welcome/tambah_basis_pengetahuan" method="POST" >
          <div class="modal-body">

            <div class="form-group">
              <label for="id_kerusakan">Kerusakan:</label>
              <select name="id_kerusakan" class="custom-select">
                           <!-- <option selected>driver</option> -->
                        <?php foreach ($query2->result() as $dr){ ?>
                        <option value="<?= $dr->id_kerusakan; ?>"><?= $dr->kerusakan; ?></option>
                        <?php  } ?>  
                      </select>
              <?= form_error('id_kerusakan','<small class="text-danger pl-3 ">','</small>');?>
            </div>
            <div class="form-group">
              <label for="id_jenis_kerusakan">Jenis kerusakan:</label>
              <select name="id_jenis_kerusakan" class="custom-select">
                           <!-- <option selected>driver</option> -->
                        <?php foreach ($query3->result() as $dr){ ?>
                        <option value="<?= $dr->id_jenis_kerusakan; ?>"><?= $dr->jenis_kerusakan; ?></option>
                        <?php  } ?>  
                      </select>
              <?= form_error('id_jenis_kerusakan','<small class="text-danger pl-3 ">','</small>');?>
            </div>
            <div class="form-group">
              <label for="id_gejala">Gejala:</label>
              <select name="id_gejala" class="custom-select">
                           <!-- <option selected>driver</option> -->
                        <?php foreach ($query4->result() as $dr){ ?>
                        <option value="<?= $dr->id_gejala; ?>"><?= $dr->gejala; ?></option>
                        <?php  } ?>  
                      </select>
              <?= form_error('id_gejala','<small class="text-danger pl-3 ">','</small>');?>
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