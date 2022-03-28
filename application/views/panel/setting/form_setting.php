<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile website</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile website</li>
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
                <!-- Profile website elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Silahkan input untuk mengubah profile website</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form enctype="multipart/form-data" action="<?= site_url('c/panel/halaman/process') ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" value="<?= $row->email ?>" name="email" placeholder="email">
                            </div>
                            <div class="form-group">
                                <label>Admin 1:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="admin_1" value="<?= $row->admin_1 ?>" data-inputmask='"mask": "(999) 999-999-9999"' data-mask>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label for="admin 1">Link Whatsapp Admin 1:</label>
                                <input type="link" class="form-control" id="admin 1" value="<?= $row->link_1 ?>" name="link_1" placeholder="https://">
                            </div>

                            <div class="form-group">
                                <label>Admin 2:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="admin_2" value="<?= $row->admin_2 ?>" data-inputmask='"mask": "(999) 999-999-9999"' data-mask>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label for="admin2">Link Whatsapp Admin 2:</label>
                                <input type="link" class="form-control" id="admin 1" name="link_2" value="<?= $row->link_2 ?>" placeholder="https://">
                            </div>
                            <div class="form-group">
                                <label for="fb">Facebook</label>
                                <input type="link" class="form-control" id="fb" name="fb" value="<?= $row->fb ?>" placeholder="https://">
                            </div>
                            <div class="form-group">
                                <label for="ig">Instagram</label>
                                <input type="link" class="form-control" id="ig" name="ig" value="<?= $row->ig ?>" placeholder="https://">
                            </div>
                            <div class="form-group">
                                <label for="yt">Youtube</label>
                                <input type="libk" class="form-control" id="yt" name="yt" value="<?= $row->yt ?>" placeholder="https://">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" value="<?= $row->alamat ?>" name="alamat" placeholder="Alamat">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button class="btn btn-outline-success" name="edit" type="submit"><i class="fa fa-paper-plane-o fa-3x"></i>Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</section>