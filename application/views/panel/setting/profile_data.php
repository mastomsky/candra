<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ganti Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?= site_url('panel/profile'); ?>" method="POST">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="form-group row <?= form_error('passlama') ? 'has-error' : null ?>">
                                <label for="" class="col-sm-4 col-form-label">Password Lama</label>
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="<?= $this->fungsi->user_login()->user_id; ?>" class="form-control">
                                    <input type="password" name="passlama" id="passlama" class="form-control">
                                </div>
                                <?= form_error('passlama') ?>
                            </div>
                            <hr>
                            <div class="form-group row <?= form_error('passnew') ? 'has-error' : null ?>">

                                <label for="" class="col-sm-4 col-form-label">Password Baru</label>
                                <div class="col-md-6">
                                    <input type="password" name="passnew" id="passnew" class="form-control">
                                </div>
                                <?= form_error('passnew') ?>

                            </div>
                            <div class="form-group row <?= form_error('passconf') ? 'has-error' : null ?>">
                                <label for="" class="col-sm-4 col-form-label">Konfirmasi Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="passconf" id="passconf" class="form-control">
                                </div>
                                <?= form_error('passconf') ?>

                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;Simpan</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->