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

              <div>
                <h3 class="text-danger"><?= $jenis_kerusakan['jenis_kerusakan']; ?></h3>
              </div>
              <hr>

              <div class="table responsive">
                <table class="table table-bordered text-gray-800"  width="100%" cellspacing="1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Gejala</th>
                      
                   
                    </tr>
                  </thead>
                 
                  <tbody>
                     <?php
                         $no=1;
                         foreach($query->result() as $q) { ?>
                        
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $q->gejala ?></td>
                        </tr>

                        <?php $no++; } ?> 
                  
                  </tbody>
                </table>
              </div><div class="table responsive">
                <table class="table"  width="100%" cellspacing="1">
                  <tbody>
                    <tr>
                      <td width="10%" class="text-primary font-weight-bold">Solusi :</td>
                      <td width="90%" ><textarea name="solusi" class="form-control" id="solusi" rows="3" readonly="">
                        <?= $jenis_kerusakan['solusi']; ?>
                      </textarea></td>
                      
                   
                    </tr>
                    <tr>
                      <td><a href=" <?=base_url('Mekanik') ?> " class="btn btn-danger" style="margin-bottom: 10px;"> Ulangi </a></td>
                      <td><a href=" <?=base_url('Mekanik/selesai_diagnosa') ?> " class="btn btn-warning" style="margin-bottom: 10px;"> Selesai & Simpan </a></td>
                    </tr>
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