<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Promo Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Promo Form</li>
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
                <!-- promo form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Silahkan input untuk </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form enctype="multipart/form-data" action="<?= site_url('panel/promo/process') ?>" method="POST">
                        <div class="card-body">
                            <?= csrf(); ?>
                            <div class="form-group">
                                <input type="hidden" id="promo_id" name="promo_id" value="<?= $row->promo_id ?>">
                                <label for="foto">Foto</label>
                                <div class="image">
                                    <?php if ($page == 'edit') {
                                        if ($row->foto != null) { ?>
                                            <div class="col-md-6">
                                                <img src="<?= base_url('uploads/promo/' . $row->foto) ?>" width="200px" alt="">
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
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="10"><?= $row->keterangan ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Choose Status</option>
                                    <option value="1" <?= ($row->status == 1 ? "selected" : null) ?>><span class="badge badge-success">Active</span></option>
                                    <option value="2" <?= ($row->status == 2 ? "selected" : null) ?>><span class="badge badge-danger">Not Active</span></option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button class="btn btn-outline-success" name="<?= $page ?>" type="submit"><i class="fa fa-paper-plane-o fa-3x"></i>Simpan</button>
                            <a href="<?= site_url('cpanel/dashboard') ?>" class="btn btn-outline-secondary float-lg-right">Kembali</a>

                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>