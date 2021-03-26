<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DIAGNOSA</h1>
          </div>


         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Proses Diagnosa Kendaraan</h6>
            </div>
            <div class="card-body">

              <div class="font-weight-bold">
              <div class="row">
                <div class="col-sm">
                  Nama Mekanik
                </div>
                <div class="col-sm">
                  : &nbsp; <?= $query['nama'] ?>
                </div>
                <div class="col-sm">
                 
                </div>
                <div class="col-sm">
                  
                </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  Nama Pembawa
                </div>
                <div class="col-sm">
                  : &nbsp; <?= $query['nama_pembawa'] ?>
                </div>
                <div class="col-sm">
                 
                </div>
                <div class="col-sm">
                  
                </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  Tanggal
                </div>
                <div class="col-sm">
                  : &nbsp; <?= $query['tanggal'] ?>
                </div>
                <div class="col-sm">
                 
                </div>
                <div class="col-sm">
                  
                </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  No Polisi
                </div>
                <div class="col-sm">
                  : &nbsp; <?= $query['no_polisi'] ?>
                </div>
                <div class="col-sm">
                 
                </div>
                <div class="col-sm">
                  
                </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  No Mesin
                </div>
                <div class="col-sm">
                  : &nbsp; <?= $query['no_mesin'] ?>
                </div>
                <div class="col-sm">
                 
                </div>
                <div class="col-sm">
                  
                </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  Tipe / Tahun Kendaraan
                </div>
                <div class="col-sm">
                  : &nbsp; <?= $query['tipe'] ?>
                </div>
                <div class="col-sm">
                 
                </div>
                <div class="col-sm">
                  
                </div>
              </div>

              <div class="row mb-5">
                <div class="col-sm">
                  KM
                </div>
                <div class="col-sm">
                  : &nbsp; <?= $query['km'] ?>
                </div>
                <div class="col-sm">
                 
                </div>
                <div class="col-sm">
                  
                </div>
              </div>

            <div class="row">

               <?php
                    foreach($kerusakan->result() as $q) { ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-primary text-uppercase mb-2"><?= $q->kerusakan; ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a class="btn btn-sm btn-primary"  href="<?= base_url('Mekanik/mulai_diagnosa/').$q->id_kerusakan; ?>">Mulai Diagnosa</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php  } ?> 

          </div>

            </div>
                        
              
            </div>
          </div>



          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->