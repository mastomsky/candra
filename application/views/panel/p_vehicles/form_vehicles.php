<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Toyota Vehicles Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Toyota Vehicles Form</li>
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
            <div class="col-md-12">
                <!-- Toyota Vehicles form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Please input to add a new toyota vehicle</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form enctype="multipart/form-data" action="<?= site_url('cpanel/vehicles/process') ?>" method="POST">
                        <?= csrf(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nama">Vehicles Name</label>
                                    <input type="hidden" id="vehicles_id" name="vehicles_id" value="<?= $row->vehicles_id ?>">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $row->nama ?>" placeholder="Vehicles Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ket">Vehicles Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Choose Category</option>
                                        <?php foreach ($category->result() as $key => $ser) { ?>
                                            <option value="<?= $ser->category_id ?>" <?= $ser->category_id == $row->category ? "selected" : null ?>><?= $ser->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="harga">Starting at</label>
                                    <input class="form-control" type="text" name="harga" id="harga" pattern="^\$\d{1.3}(.\d{3})*(\,\d+)?$" value="<?= $row->harga ?>" data-type="currency" placeholder="IDR. 1.000.000,00">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">Choose Status</option>
                                        <option value="1" <?= $row->status == 1 ? "selected" : null ?>>Active</option>
                                        <option value="2" <?= $row->status == 2 ? "selected" : null ?>>Not Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <div class="image">
                                    <?php if ($page == 'edit') {
                                        if ($row->foto != null) { ?>
                                            <div class="col-md-6">
                                                <img src="<?= base_url('uploads/vehicles/' . $row->foto) ?>" width="200px" alt="">
                                            </div>
                                    <?php
                                        }
                                    } ?>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto">
                                        <label class="custom-file-label" for="foto">Choose Foto</label>
                                    </div>
                                </div>
                                <small class="form-text text-muted alert alert-info text-white">Please upload the image with the <strong>width</strong> and <strong>height</strong> <strong>(500 x 500 pixels)</strong><br>(&nbsp;leave blank if not <strong><?= $page == 'edit' ? 'Change' : 'Present' ?></strong>&nbsp;)</small>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button class="btn btn-outline-success" name="<?= $page ?>" type="submit"><i class="fa fa-paper-plane-o fa-3x"></i>Simpan</button>
                            <a href="<?= site_url('cpanel/vehicles') ?>" class="btn btn-outline-secondary float-lg-right">Go Back</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>