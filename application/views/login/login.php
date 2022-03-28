<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Toyota Surabaya Termurah | Login</title>
    <link rel="icon" type="image/png" href="https://ramo-statics.s3-ap-southeast-1.amazonaws.com/images/dealer/logo/favicontoyota.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
    <link href="<?= base_url('assets/') ?>sweetalert/css/sweetalert2.min.css" rel="stylesheet">

</head>

<body class="hold-transition login-page">
    <div id="flash" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
    <div id="flasherror" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>
    <div class="login-box">
        <?php if (!$this->session->csrf_token) {
            $this->session->csrf_token = hash('sha1', time());
        } ?>
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="javascript:0;" class="h1"><b>Control Panel</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">
                </p>

                <form action="<?= site_url('auth/login') ?>" method="post">
                    <?= csrf(); ?>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <?php echo $widget; ?>
                        <?php echo $script; ?>
                    </div>
                    <div class="row">

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>sweetalert/sweetalert2.all.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
    <script>
        var flash = $('#flash').data('flash');
        var flasherror = $('#flasherror').data('flasherror');
        if (flash) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: flash
            })
        }
        if (flasherror) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: flasherror
            })
        }
    </script>
</body>

</html>