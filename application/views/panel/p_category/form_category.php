<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>category Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">category Form</li>
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
                <!-- category form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Silahkan input untuk <?= $page == 'edit' ? 'mengubah' : 'menambahkan' ?> category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= site_url('cpanel/category/process') ?>" method="POST">
                        <?= csrf(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="hidden" id="category_id" name="category_id" value="<?= $row->category_id ?>">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row->nama ?>" placeholder="Nama">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button class="btn btn-outline-success" name="<?= $page ?>" type="submit"><i class="fa fa-paper-plane-o fa-3x"></i>Simpan</button>
                            <a href="<?= site_url('cpanel/category') ?>" class="btn btn-outline-secondary float-lg-right">Kembali</a>

                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>