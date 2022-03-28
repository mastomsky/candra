    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Vehicle</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Vehicle</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div id="flash" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= site_url('panel/vehicle-detail/add') ?>" class="btn btn-outline-primary float-lg-right">Add</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="mb-0 table table-bordered" id="tabel1" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Foto</th>
                                        <th>Vehicle Name</th>
                                        <th>Vehicle Category</th>
                                        <th>Vehicle Type</th>
                                        <th>Price</th>
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
            </div>
        </div>
    </section>
    <script>
        var tabel1 = $('#tabel1');

        $(document).ready(function() {
            var table = $('#tabel1').dataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('serverside/get_detail_product') ?>",
                    "type": "POST",

                },
                "coloumnDefs": [{
                    "target": [-1],
                    "orderable": false,

                }],
            })
        })
    </script>