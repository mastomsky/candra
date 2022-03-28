<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Porfolio Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Porfolio Form</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div id="flasherror" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- Porfolio form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Silahkan input untuk menambahkan portfolio</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form enctype="multipart/form-data" action="<?= site_url('panel/portfolio/process') ?>" method="POST">
                        <?= csrf(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="hidden" id="portfolio_id" name="portfolio_id" value="<?= $row->portfolio_id ?>">

                                <div class="image">
                                    <?php if ($page == 'edit') {
                                        if ($row->foto != null) { ?>
                                            <div class="col-md-6">
                                                <img src="<?= base_url('uploads/portfolio/' . $row->foto) ?>" width="200px" alt="">
                                            </div>
                                    <?php
                                        }
                                    } ?>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto">
                                        <label class="custom-file-label" for="foto">Pilih Foto</label>
                                    </div>
                                </div>
                                <small class="form-text text-muted alert alert-info text-white">Please upload the image with the <strong>width</strong> and <strong>height</strong> <strong>(500 x 500 pixels)</strong><br>(&nbsp;leave blank if not <strong><?= $page == 'edit' ? 'Change' : 'Present' ?></strong>&nbsp;)</small>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button class="btn btn-outline-success" name="<?= $page ?>" type="submit"><i class="fa fa-paper-plane-o fa-3x"></i>Simpan</button>
                            <a href="<?= site_url('panel/portfolio') ?>" class="btn btn-outline-secondary float-lg-right">Kembali</a>

                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>