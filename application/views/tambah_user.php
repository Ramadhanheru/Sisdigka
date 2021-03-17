<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">MEKANIK</h1>
          </div>


         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Tambah Mekanik</h6>
            </div>
            <div class="card-body">
                        
              <div>
                  <form action="<?= base_url('welcome/tambah_user') ?>" method="POST" novalidate">
                    <div class="form-group">
                      <label for="nama">Nama:</label>
                      <input type="text" name="nama" class="form-control" id="nama" required="required">
                       <?= form_error('nama','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="user">User:</label>
                      <input type="text" name="user" class="form-control" id="user" required="required">
                       <?= form_error('user','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password" name="password" class="form-control" id="password" required="required">
                      <?= form_error('password','<small class="text-danger pl-3 ">','</small>');?>

                    </div>
                    
                    <button id="send" type="submit" class="btn btn-primary">Submit</button>
                    <a href=" <?=base_url('welcome') ?> " class="btn btn-warning">Cancel</a>
                </form>
              </div>
            </div>
          </div>



          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->