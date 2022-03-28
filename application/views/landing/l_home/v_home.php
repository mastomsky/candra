    <!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-40">
        <div id="carousel-example-generic" class="carousel slide carousel-slider" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators carousel-indicators-frontend">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First slide -->
                <?php $no = 0;
                foreach ($banner as $ban) { ?>
                    <?php if ($no === 0) :
                        $active = 'active';
                    else :
                        $active = '';
                    endif;
                    $no++; ?>
                    <div class="item carousel-item-eight <?= $active; ?>">
                        <img src="<?= base_url('uploads/banner/' . $ban->foto) ?>" alt="" class="d-block w-100 img-responsive">
                    </div>
                <?php
                } ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- END SLIDER -->

    <div class="main">
        <div class="container">
            <div class="row margin-bottom-40">
                <h1 class="text-center">Vehicles Model</h1>
                <!-- Nav tabs -->
                <div class="print-tab" data-tab-id="1">
                    <ul class="print-tab-menu">
                        <?php foreach ($category as $cat) { ?>
                            <li id="<?= $cat->category_id ?>" data-tab-menu="<?= strtolower($cat->nama) ?>"><a><?= $cat->nama; ?></a></li>
                        <?php
                        } ?>
                    </ul>
                    <div class="print-tab-content" id="vehicles_model">

                    </div>
                </div>
            </div>
            <div class="row ">
                <h1 class="text-center">Toyota Promo</h1>

                <?php foreach ($promo as $pro) { ?>
                    <div class="col-md-4">
                        <div class="blog-card blog-card-blog">
                            <div class="blog-card-image">
                                <a href="javascript:0;"> <img class="img" src="<?= base_url('uploads/promo/' . $pro->foto); ?>"> </a>
                                <div class="ripple-cont"></div>
                            </div>
                            <div class="blog-table">
                                <div class="row blog-category">
                                    <h6 class="blog-text-success float-right"><i class="far fa-newspaper"></i><?=indo_date($pro->created)?></h6>
                                </div>

                                <p class="blog-card-description"><?= $pro->keterangan ?></p>
                                <div class="ftr">
                                    <div class="author">
                                        <a href="https://api.whatsapp.com/send?phone=6281357199161"> <span class="fa fa-whatsapp ">&nbsp;</span>Info Lebih lanjut</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row margin-bottom-40 text-center">
                <a href="<?= site_url('promo-toyota') ?>" class="btn btn-primary text-center">See More Promo</a>
            </div>
            <div class="row margin-bottom-40">
                <div class="resume">
                    <div class="resume-wrap">
                        <div class="logo mb-5">
                            <div class="logo-lines logo-lines_left">
                                <span class="logo-line"></span>
                                <span class="logo-line"></span>
                                <span class="logo-line"></span>
                            </div>
                            <div class="logo-img"><img src="<?= base_url('uploads/img/resume_photo.png') ?>" alt="" class="img-fluid"></div>
                            <div class="logo-lines logo-lines_right">
                                <span class="logo-line"></span>
                                <span class="logo-line"></span>
                                <span class="logo-line"></span>
                            </div>
                            <div class="about">
                                <h1 class="name">Candra</h1>
                                <p class="position">Car Consultant</p>
                                <address class="about-address">Jl. Indrapura No.47 Surabya Jawa Timur</address>
                                <div class="about-contacts">
                                    <a href="https://api.whatsapp.com/send?phone=6281357199161" class=""><b><i class="fa fa-whatsapp"></i></b> : 0813-5719-9161</a> |
                                    <a href="" class=""><b><i class="fa fa-instagram"></i></b> : www.toyotasurabayatermurah.com</a> |
                                    <a href="mailto:kristian.adicandra84@gmail.com" class=""><b>e</b> : kristian.adicandra84@gmail.com</a> |
                                </div>
                            </div>
                        </div>
                        <div class="row resume_row">
                            <span class="informasi mb-5">Dapatkan Semua Informasi Lengkap Pembelian Mobil Toyota Terbaru Disini:</span>
                            <ul class="list">
                                <li class="list-item">
                                    <h4 class="list-item__title">Pembelian Tunai atau Kredit</h4>
                                </li>
                                <li class="list-item">

                                    <h4 class="list-item__title">Program Diskon PPnBM Terbaru</h4>
                                </li>

                                <li class="list-item">
                                    <h4 class="list-item__title">Paket Kredit Dp Murah 25%</h4>
                                </li>

                                <li class="list-item">

                                    <h4 class="list-item__title">Paket Kredit Cicilan Ringan</h4>
                                </li>

                                <li class="list-item">

                                    <h4 class="list-item__title">Paket Kredit Bunga Rendah</h4>
                                </li>

                                <li class="list-item">

                                    <h4 class="list-item__title">Paket Kredit Tenor Panjang 5 Tahun</h4>
                                </li>

                                <li class="list-item">

                                    <h4 class="list-item__title">Tersedia Berbagai Pilihan Leasing</h4>
                                </li>

                                <li class="list-item">

                                    <h4 class="list-item__title">Bonus Pembelian</h4>
                                </li>

                                <li class="list-item">

                                    <h4 class="list-item__title">Pembelian Bisa Diruamah</h4>
                                </li>

                                <li class="list-item">

                                    <h4 class="list-item__title">Di Proses Cepat, Mudah dan Aman</h4>
                                </li>

                                <li class="list-item">

                                    <h4 class="list-item__title">Terima Tukar Tambah Segala Merk</h4>
                                </li>

                            </ul>
                            <span>Berlaku untuk All Jawa Timur</span>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>

    <!-- BEGIN RECENT WORKS -->