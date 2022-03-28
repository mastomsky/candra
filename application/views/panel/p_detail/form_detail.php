<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Vehicles Specification Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Vehicles Specification Form</li>
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
                        <h3 class="card-title">Please input to add a new vehicle specification</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form enctype="multipart/form-data" action="<?= site_url('panel/vehicle-detail/process') ?>" method="POST">
                        <?= csrf(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group  col-md-3">
                                    <label for="foto_detail">Foto</label>
                                    <div class="image">
                                        <?php if ($page == 'edit') {
                                            if ($row->foto_detail != null) { ?>
                                                <div class="col-md-6">
                                                    <img src="<?= base_url('uploads/vehicles/' . $row->foto_detail) ?>" width="200px" alt="">
                                                </div>
                                        <?php
                                            }
                                        } ?>
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto_detail" name="foto_detail">
                                            <label class="custom-file-label" for="foto">Choose Foto</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted alert alert-info text-white">Please upload the image with the <strong>width</strong> and <strong>height</strong> <strong>(500 x 500 pixels)</strong><br>(&nbsp;leave blank if not <strong><?= $page == 'edit' ? 'Change' : 'Present' ?></strong>&nbsp;)</small>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nama">Vehicles Name</label>
                                    <input type="hidden" id="detail_id" name="detail_id" value="<?= $row->detail_id ?>">
                                    <div class="input-group">
                                        <input type="hidden" id="vehicles_id" name="vehicles_id" value="">
                                        <input type="text" id="nama" name="nama" value="" class="form-control" readonly>
                                        <input type="hidden" id="category_id" name="category_id" value="">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-search"></i></button>

                                    </div>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ket">Vehicles Type</label>
                                    <select name="type_id" id="type_id" class="form-control">
                                        <option value="">Choose Type</option>
                                        <?php foreach ($type->result() as $key => $ser) { ?>
                                            <option value="<?= $ser->type_id ?>" <?= $ser->type_id == $row->type_id ? "selected" : null ?>><?= $ser->type_nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="prduct_cc">Product cc</label>
                                    <input type="text" class="form-control" id="product_cc" name="product_cc" value="<?= $row->product_cc ?>" value="CC">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="seat_product">Seat product</label>
                                    <input type="text" class="form-control" id="seat_product" name="seat_product" value="<?= $row->seat_product ?>" value="Seat">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="price">Price</label>
                                    <input class="form-control" type="text" name="price" id="price" pattern="^\$\d{1.3}(.\d{3})*(\,\d+)?$" value="<?= $row->price ?>" data-type="currency" placeholder="IDR. 1.000.000,00">
                                </div>
                            </div>


                            <div class="form-group">
                                <dl class="gridtab-2">
                                    <dt>Mesin</dt>
                                    <dd>
                                        <textarea name="mesin" id="mesin" rows="10"><?= $row->mesin ?></textarea>
                                    </dd>
                                    <dt>Transmisi</dt>
                                    <dd>
                                        <textarea name="transmisi" id="transmisi" rows="10"><?= $row->transmisi ?></textarea>
                                    </dd>
                                    <dt>Exterior</dt>
                                    <dd>
                                        <textarea name="exterior" id="exterior" rows="10"><?= $row->exterior ?></textarea>
                                    </dd>
                                    <dt>Interior</dt>
                                    <dd>
                                        <textarea name="interior" id="interior" rows="10"><?= $row->interior ?></textarea>
                                    </dd>
                                    <dt>Dimensi</dt>
                                    <dd>
                                        <textarea name="dimensi" id="dimensi" rows="10"><?= $row->dimensi ?></textarea>
                                    </dd>
                                    <dt>Kenyamanan dan Keselamatan</dt>
                                    <dd>
                                        <textarea name="kenyamanan" id="kenyamanan" rows="10"><?= $row->kenyamanan ?></textarea>
                                    </dd>
                                    <dt>Sasis</dt>
                                    <dd>
                                        <textarea name="sasis" id="sasis" rows="10"><?= $row->sasis ?></textarea>
                                    </dd>
                                    <dt>Rem</dt>
                                    <dd>
                                        <textarea name="rem" id="rem" rows="10"><?= $row->rem ?></textarea>
                                    </dd>
                                    <dt>Suspensi</dt>
                                    <dd>
                                        <textarea name="suspensi" id="suspensi" rows="10"><?= $row->suspensi ?></textarea>
                                    </dd>
                                    <dt>Warna</dt>
                                    <dd>
                                        <textarea name="warna" id="warna" rows="10"><?= $row->warna ?></textarea>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button class="btn btn-outline-success" name="add" type="submit"><i class="fa fa-paper-plane-o fa-3x"></i>Simpan</button>
                            <a href="<?= site_url('panel/vehicle-detail') ?>" class="btn btn-outline-secondary float-lg-right">Go Back</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Toyota Vehicles</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <table class="mb-0 table table-bordered" id="modal_detail" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Category</th>
                            <th>Harga</th>
                            <th style="width: 100px">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    var modal_detail = $('#modal_detail');

    $(document).ready(function() {
        var table = $('#modal_detail').dataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('serverside/get_vehicles_modal') ?>",
                "type": "POST",

            },
            "coloumnDefs": [{
                "target": [-1],
                "orderable": false,

            }],
        })
    });
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var vehicles_id = $(this).data('vehicles_id');
            var nama = $(this).data('nama');
            var category_id = $(this).data('category_id');
            $('#vehicles_id').val(vehicles_id);
            $('#nama').val(nama);
            $('#category_id').val(category_id);
            $('#modal-lg').modal('hide');
        })
    });
</script>