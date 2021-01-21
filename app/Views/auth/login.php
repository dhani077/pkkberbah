<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PKK Berbah | Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">PKK Kecamatan Berbah</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
    </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-lg-7 mt-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <img src="/icon/logopkk.png" alt="" width="100" height="100">
                    <br><br>
                    <h1 class="h4 text-gray-900 mb-4">Hai admin, silahkan login!</h1>
                  </div>
                  <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-danger" role="alert">
                      <?= session()->getFlashData('pesan'); ?>
                    </div>
                  <?php endif; ?>
                  <?php if (session()->getFlashdata('keluar')) : ?>
                    <div class="alert alert-success" role="alert">
                      <?= session()->getFlashData('keluar'); ?>
                    </div>
                  <?php endif; ?>
                  <form class="user" action="/AuthCon/cekLogin" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Username" value="<?= old('username'); ?>">
                      <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                      <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>