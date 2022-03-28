<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Type Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Type Form</li>
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
            <!-- left column -->
            <div class="col-md-6">
                <!-- type form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Silahkan input untuk <?= $page == 'edit' ? 'mengubah' : 'menambahkan' ?> type</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= site_url('panel/vehicle-type/process') ?>" method="POST">
                        <?= csrf(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="hidden" id="type_id" name="type_id" value="<?= $row->type_id ?>">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row->type_nama ?>" placeholder="Nama">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button class="btn btn-outline-success" name="<?= $page ?>" type="submit"><i class="fa fa-paper-plane-o fa-3x"></i>Simpan</button>
                            <a href="<?= site_url('panel/category') ?>" class="btn btn-outline-secondary float-lg-right">Kembali</a>

                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>