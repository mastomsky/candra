<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form user baru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Form user baru</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div id="flasherror" data-flash="<?= $this->session->flashdata('erorr'); ?>"></div>

        <form enctype="multipart/form-data" action="<?= site_url('panel/user/process') ?>" method="POST">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Silahkan input untuk menambahkan user baru</h3>
                </div>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="hidden" id="user_id" name="user_id" value="<?= $row->user_id ?>">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row->nama ?>" placeholder="Nama Panggilan" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="***********">
                            </div>
                            <div class="form-group">
                                <label for="ket">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="1" <?= $row->jk == 1 ? "selected" : null ?>>Laki - Laki</option>
                                    <option value="2" <?= $row->jk == 2 ? "selected" : null ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ket">Telpon</label>
                                <input type="text" class="form-control" id="telpon" name="telpon" value="<?= $row->telpon ?>" placeholder="Telpon" required>
                            </div>



                        </div>
                        <!-- /.card-body -->


                    </div>
                    <div class="col-md-6">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="Alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="" class="form-control" placeholder="Masukan alamat anda" required><?= $row->alamat ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $row->email ?>" required placeholder="example@contoh.com">
                            </div>
                            <div class="form-group">
                                <label for="ket">Jabatan</label>
                                <select name="jabatan" id="jabatan" class="form-control" required>
                                    <option value="">Pilih Jabatan</option>
                                    <option value="1" <?= $row->jabatan == 1 ? "selected" : null ?>>Admin</option>
                                    <option value="2" <?= $row->jabatan == 2 ? "selected" : null ?>>Standard</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih status</option>
                                    <option value="1" <?= $row->status == 1 ? "selected" : null ?>>Aktif</option>
                                    <option value="2" <?= $row->status == 2 ? "selected" : null ?>>Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <div class="image">
                                    <?php if ($page == 'edit') {
                                        if ($row->foto != null) { ?>
                                            <div class="col-md-6">
                                                <img src="<?= base_url('uploads/user/' . $row->foto) ?>" width="200px" alt="">
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
                            <!-- /.card-body -->
                        </div>


                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-outline-success" name="<?= $page ?>" type="submit"><i class="fa fa-paper-plane-o fa-3x"></i>Simpan</button>
                    <a href="<?= site_url('panel/user') ?>" class="btn btn-outline-secondary float-lg-right">Kembali</a>
                </div>
        </form>
    </div>
</section>