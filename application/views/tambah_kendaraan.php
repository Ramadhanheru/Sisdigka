<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">KENDARAAN MASUK</h1>
          </div>


         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kendaraan Masuk</h6>
            </div>
            <div class="card-body">
                        
              <div>
                  <form action="<?= base_url('welcome/t_kendaraan') ?>" method="POST" novalidate">
                    <div class="form-group">
                      <label for="No">Mekanik:</label>
                      <select name="mekanik" class="custom-select">
                           <!-- <option selected>driver</option> -->
                        <?php foreach ($query->result() as $dr){ ?>
                        <option value="<?= $dr->id_user; ?>"><?= $dr->nama; ?></option>
                        <?php  } ?>  
                      </select>
                       <?= form_error('mekanik','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="nama_stnk">Nama STNK:</label>
                      <input type="text" name="nama_stnk" class="form-control" id="nama_stnk" required="required">
                       <?= form_error('nama_stnk','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="nama_pembawa">Nama Pembawa:</label>
                      <input type="text" name="nama_pembawa" class="form-control" id="nama_pembawa" required="required">
                       <?= form_error('nama_pembawa','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="tanggal">Tanggal:</label>
                      <input type="date" name="tanggal" class="form-control" id="tanggal" required="required">
                      <?= form_error('tanggal','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat:</label>
                      <input type="text" name="alamat" class="form-control" id="alamat" required="required">
                       <?= form_error('alamat','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="no_hp">No Hp:</label>
                      <input type="text" name="no_hp" class="form-control" id="no_hp" required="required">
                       <?= form_error('no_hp','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="no_polisi">NO Polisi:</label>
                      <input type="text" name="no_polisi" class="form-control" id="no_polisi" required="required">
                       <?= form_error('no_polisi','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="no_mesin">No Mesin:</label>
                      <input type="text" name="no_mesin" class="form-control" id="no_mesin" required="required">
                       <?= form_error('no_mesin','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="tipe">Tipe/Tahun:</label>
                      <input type="text" name="tipe" class="form-control" id="tipe" required="required">
                       <?= form_error('tipe','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    <div class="form-group">
                      <label for="km">Km Kendaraan:</label>
                      <input type="text" name="km" class="form-control" id="km" required="required">
                       <?= form_error('km','<small class="text-danger pl-3 ">','</small>');?>
                    </div>
                    
                    
                    <button id="send" type="submit" class="btn btn-primary">Submit</button>
                    <a href=" <?=base_url('welcome/kendaraan_masuk') ?> " class="btn btn-warning">Cancel</a>
                </form>
              </div>
            </div>
          </div>



          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->