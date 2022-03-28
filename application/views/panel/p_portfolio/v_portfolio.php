    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Portfolio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Portfolio</li>
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
                            <h3 class="card-title">Data Portfolio</h3>
                            <a href="<?= site_url('panel/portfolio/add') ?>" class="btn btn-outline-primary float-lg-right">Add</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="mb-0 table table-bordered" id="portfolio" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Created</th>
                                        <th>Opsi</th>
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
        var portfolio = $('#portfolio');

        $(document).ready(function() {
            var table = $('#portfolio').dataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('serverside/get_portfolio') ?>",
                    "type": "POST",

                },
                "coloumnDefs": [{
                    "target": [-1],
                    "orderable": false,

                }],
            })
        })
    </script>