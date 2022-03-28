<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div id="flash" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
<!-- Main content -->
<!-- /.content -->
<section class="content">
    <div class="container-fluid">
        <div id="flash" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-lg-left">Banner Carousel</h5>
                        <a href="<?= site_url('panel/banner/add') ?>" class="btn btn-outline-warning float-lg-right">Banner Add</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="mb-0 table table-bordered" id="banner" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th style="width: 100px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-lg-left">Toyota Promo</h5>
                        <a href="<?= site_url('panel/promo/add') ?>" class="btn btn-outline-warning float-lg-right">Promo Add</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="mb-0 table table-bordered" id="promo" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Foto</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th style="width: 100px">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<script>
    var banner = $('#banner');
    var promo = $('#promo');

    $(document).ready(function() {
        var table = $('#banner').dataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('serverside/get_banner') ?>",
                "type": "POST",

            },
            "coloumnDefs": [{
                "target": [-1],
                "orderable": false,

            }],
        });
        var promo = $('#promo').dataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('serverside/get_promo') ?>",
                "type": "POST",

            },
            "coloumnDefs": [{
                "target": [-1],
                "orderable": false,

            }],
        });
    })
</script>