
        <div id="page-wrapper">
            <div id="page-inner"> 

                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="alert alert-success">
                                    Anda masuk sebagai <strong><?= $this->session->userdata('user') ?>!</strong>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                         </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                             Table User
                        </div>
                        <div class="card-content">
                            <a class="waves-effect waves-light btn" href="<?= base_url('welcome/tambah_user_'); ?>" style="margin-bottom: 10px;"><i class="material-icons left">add</i>Tambah</a>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $no=1;
                                         foreach($query->result() as $q) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $no; ?></td>
                                            <td><?= $q->user; ?></td>
                                            <td><?= $q->password; ?></td>
                                            <td class="center"><?= $q->role; ?></td>
                                            <td>edit | hapus</td>
                                        </tr>
                                        
                                      <?php $no++; } ?> 
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->

                                    
                 <footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
                </div>
            </div>
                <!-- /. ROW  -->
            
                </div>
            </div>