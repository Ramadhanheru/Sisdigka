<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assetss/'); ?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('assetss/'); ?>css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assetss/'); ?>css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('assetss/'); ?>css/style.css">

    <title>SPK diagnosa thamrin group</title>
  </head>
  <body>
  

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('http://localhost/Sisdigka/assetss/images/bg_1.png');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>Login to <strong>Thamrin Diagnosa</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="<?= base_url('login/loginn'); ?>" method="post">
                <div class="form-group first">
                  <?= $this->session->flashdata('message');?>
                  <label for="username">Username</label>
                  <input type="text" class="form-control" placeholder="Your username" id="user" name="user">
                  <?= form_error('user','<small class="text-danger pl-3 ">','</small>');?>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
                  <?= form_error('password','<small class="text-danger pl-3 ">','</small>');?>
                </div>
                
                <!-- <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                </div> -->

                <input type="submit" value="Log In" class="btn btn-block btn-primary">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="<?= base_url('assetss/'); ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assetss/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assetss/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assetss/'); ?>js/main.js"></script>
  </body>
</html>