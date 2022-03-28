<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $judul; ?> | Panel</title>
<link rel="icon" type="image/png" href="https://ramo-statics.s3-ap-southeast-1.amazonaws.com/images/dealer/logo/favicontoyota.png">
  <!-- Google Font: Source Sans Pro -->
  <link href="<?= base_url('assets/') ?>sweetalert/css/sweetalert2.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
  <!-- datatable -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/rowGroup.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/dataTables.bootstrap4.min.css">
  <!-- end datatable -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- grid tab -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/gridtab-v2/') ?>gridtab.min.css" />
  <style>
    .swal2-icon {
      font-size: 20px !important;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed ">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url('uploads/user/' . $this->fungsi->user_login()->foto) ?>" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline"> <?= $this->fungsi->user_login()->nama ?>
            </span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-gradient-danger">
              <img src="<?= base_url('uploads/user/' . $this->fungsi->user_login()->foto) ?>" class="img-circle elevation-3" alt="User Image">

              <p>
                <?= $this->fungsi->user_login()->nama ?>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="<?= site_url('panel/profile') ?>" class="btn btn-default btn-flat">Ubah password</a>
              <a href="<?= site_url('panel/logout') ?>" class="btn btn-default btn-flat float-right"><i class="fa fa-power-off text-danger"></i> Keluar</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-white elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img style="width: 230px;" src="<?= base_url('uploads/img/letgobeyond.png') ?>" alt="Cahaya Abadi Design" class="ml-auto">
      </a>

      <!-- Sidebar -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= site_url('panel/dashboard') ?>" class="nav-link  <?= $this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('panel/category') ?>" class="nav-link <?= $this->uri->segment(2) == 'category' ? 'active' : '' ?>">
              <i class="fa fa-plus-square nav-icon"></i>
              <p>Category and Type</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('panel/vehicles') ?>" class="nav-link <?= $this->uri->segment(2) == 'vehicles' ? 'active' : '' ?>">
              <i class="fa fa-car-alt nav-icon"></i>
              <p>Toyota Vehicles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('panel/vehicle-detail') ?>" class="nav-link <?= $this->uri->segment(2) == 'vehicle-detail' ? 'active' : '' ?>">
              <i class="fa fa-car-side nav-icon"></i> 
              <p>Vehicle Details</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('panel/portfolio') ?>" class="nav-link <?= $this->uri->segment(2) == 'portfolio' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-rss"></i>
              <p>
                Portfolio
              </p>
            </a>
          </li>
          <?php if ($this->fungsi->user_login()->jabatan == 1) { ?>
            <li class="nav-item">
              <a href="<?= site_url('panel/user') ?>" class="nav-link <?= $this->uri->segment(2) == 'user' ? 'active' : '' ?>">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Manajemen Users
                </p>
              </a>
            </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

  <script src="<?= base_url('assets/') ?>plugins/jquery/jquery-3.5.1.js"></script>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?= $contents; ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0-chandra
    </div>
    <strong>© Copyright &nbsp;<script>
        document.write(new Date().getFullYear());
      </script> <a href="https://rozitech.co.id">CV. Rozitech Multimedia Indonesia</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->

  <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/jquery/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/jquery/dataTables.rowGroup.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/') ?>sweetalert/sweetalert2.all.min.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/') ?>ckeditor/ckeditor.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/select2/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url('assets/') ?>plugins/moment/moment.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- gridtab -->
  <script type="text/javascript" src="<?= base_url('assets/') ?>plugins/gridtab-v2/gridtab.min.js"></script>
  <!-- custom file input -->
  <script src="<?= base_url('assets/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script>
    var base_url = "<?php echo base_url(); ?>";
  </script>
  <script src="<?= base_url('assets/') ?>dist/js/scripts.js"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
    CKEDITOR.replace('keterangan');
    CKEDITOR.replace('isi');
    CKEDITOR.replace('mesin');
    CKEDITOR.replace('transmisi');
    CKEDITOR.replace('exterior');
    CKEDITOR.replace('interior');
    CKEDITOR.replace('dimensi');
    CKEDITOR.replace('kenyamanan');
    CKEDITOR.replace('sasis');
    CKEDITOR.replace('rem');
    CKEDITOR.replace('suspensi');
    CKEDITOR.replace('warna');
    $('.select2').select2()
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $('[data-mask]').inputmask()
  </script>
  <!-- template js -->

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

    $(document).on('click', '#btn_hapus', function(e) {
      e.preventDefault();
      var link = $(this).attr('href');

      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda ingin menghapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00a65a',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ye, Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = link;
        }
      })
    });
    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    // Jquery Dependency price format

    $("input[data-type='currency']").on({
      keyup: function() {
        formatCurrency($(this));
      },
      blur: function() {
        formatCurrency($(this), "blur");
      }
    });


    function formatNumber(n) {
      // format number 1000000 to 1,234,567
      return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    }


    function formatCurrency(input, blur) {
      // appends $ to value, validates decimal side
      // and puts cursor back in right position.

      // get input value
      var input_val = input.val();

      // don't validate empty input
      if (input_val === "") {
        return;
      }

      // original length
      var original_len = input_val.length;

      // initial caret position 
      var caret_pos = input.prop("selectionStart");

      // check for decimal
      if (input_val.indexOf(",") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(",");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side



        // Limit decimal to only 2 digits

        // join number by .
        input_val = "IDR. " + left_side;

      } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = "IDR. " + input_val;

      }

      // send updated string to input
      input.val(input_val);

      // put caret back in the right position
      var updated_len = input_val.length;
      caret_pos = updated_len - original_len + caret_pos;
      input[0].setSelectionRange(caret_pos, caret_pos);
    }
  </script>
</body>

</html>