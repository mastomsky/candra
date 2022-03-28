<div class="main">
    <div class="bread">
        <div class="container">
            <ul class="breadcrumb mt-5">
                <li><a href="https://toyotasurabayatermurah.com/">Home</a></li>
                <li class="active"><?= $judul ?></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="show-product">
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <h1><?= $page->nama ?></h1>
                        <ul>
                            <input type="hidden" name="" id="vehicles_id" value="<?= $page->vehicles_id ?>">
                            <input type="hidden" name="" id="category_id" value=" <?= $page->category_id ?>">
                            <li><?= $page->nama_category ?></li>
                            <li><?= $page->product_cc ?></li>
                            <li><?= $page->seat_product ?></li>
                        </ul>
                        <h6>Harga OTR Surabaya Mulai</h6>
                        <h4><?= $page->harga ?></h4>
                        <h6>Hubungi Kami</h6>
                        <div class="d-flex">
                            <a href="tel:+6281357199161" class="btn btn-phone mb-1 DM-phone-modelmobil" target="_blank" rel="nofollow">
                                <i class="glyphicon glyphicon-phone"></i>
                                0813-5719-9161 </a>
                            <a href="https://api.whatsapp.com/send?phone=6281357199161" class="btn btn-whatsapp" target="_blank" rel="nofollow">
                                <i class="fa fa-whatsapp"></i>
                               0813-5719-9161 </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('uploads/vehicles/' . $page->foto) ?>" alt="">
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="spesifikasi-product">
            <h2>Spesifikasi</h2>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="text-center">

                        <h4><?= $page->nama ?></h4>
                        <div class="harga">
                        </div>
                        <select name="" class="typeSelect">
                            <option value="<?= $page->vehicles_id; ?>">Choose Type</option>
                            <?php foreach ($vehicles->result() as $key => $ser) { ?>
                                <option value="<?= $ser->type_id ?>"><?= $ser->type_nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <dl class="gridtab-2  detail-product">

                    </dl>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="product-terkait">
            <h2>Produk Terkait</h2>
            <div class="row">
                <?php foreach ($terkait_id->result() as $row) { ?>
                    <div class="col-3 col-sm-4 col-lg-3 col-xs-6">
                        <div class="car-wrap">
                            <div class="car-image">
                                <img src="<?= base_url() . 'uploads/vehicles/' . $row->foto ?>" alt="" class="img-fluid">
                            </div>
                            <div class="car-content">
                                <h4><?= $row->nama ?></h4>
                                <small>Starting at</small>
                                <h4><?= $row->harga ?></h4>
                                <hr>
                                <a href="<?= site_url('vehicle-spesification/' . strtolower($row->slug)) ?>" class="car-link">

                                    Explore
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                                <a href="https://wa.me/6281357199161" class="car-link" target="_blank">
                                    Konsultasi Pembelian
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>