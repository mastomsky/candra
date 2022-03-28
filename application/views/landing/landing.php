<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Toyota Surabaya Termurah | <?= $judul; ?></title>

    <meta content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Candra adalah Car Consultant di Liek Motor indrapura Toyota Surabaya Dealer Resmi Mobil Toyota Terbesar di Surabaya Jawa Timur. Melayani penjualan, perawatan, booking service, dan test drive. Nikmati DP ringan &amp; promo kreditnya. Temukan info lokasi showroomnya disini.">
    <meta name="keywords" content="liek motor, toyota murah surabaya, toyota terbaik,toyota sercive,toyota test drive , ">
    <meta property="fb:app_id" content="100072947648354">
    <meta property="og:url" content="https://www.toyotasurabayatermurah/">
    <meta property="og:type" content="Toyota Surabaya">
    <meta property="og:title" content="Toyota Surabaya, Dealer Resmi Terpercaya di Jawa Timur, Shworoom, Bengkel Resmi | Liek Motor Toyota Surabaya">
    <meta property="og:description" content="Liek Motor Toyota Surabaya Dealer Resmi Mobil Toyota Terbesar di Surabaya Jawa Timur. Melayani penjualan, perawatan, booking service, dan test drive. Nikmati DP ringan &amp; promo kreditnya. Temukan info lokasi showroomnya disini.">
    <meta property="og:image" content="https://s3-ap-southeast-1.amazonaws.com/ramo-statics/images/banner_slider/c5cf568df2a2a24cdd2c57dd63f73d84.jpg">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="600">

    <link rel="icon" type="image/png" href="https://ramo-statics.s3-ap-southeast-1.amazonaws.com/images/dealer/logo/favicontoyota.png">

    <!-- Fonts START -->
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="<?= base_url('landing/') ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('landing/') ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="<?= base_url('landing/') ?>assets/pages/css/animate.css" rel="stylesheet">
    <link href="<?= base_url('landing/') ?>assets/pages/css/components.css" rel="stylesheet">
    <link href="<?= base_url('landing/') ?>assets/pages/css/slider.css" rel="stylesheet">
    <link href="<?= base_url('landing/') ?>assets/pages/css/gallery.css" rel="stylesheet">
    <link href="<?= base_url('landing/') ?>assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="<?= base_url('landing/') ?>assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
    <!-- slick carousel -->
    <link href="<?= base_url('landing/') ?>assets/plugins/slick/slick.css" rel="stylesheet">
    <link href="<?= base_url('landing/') ?>assets/plugins/slick/slick-theme.css" rel="stylesheet">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->

    <link href="<?= base_url('landing/') ?>assets/corporate/css/style.css" rel="stylesheet">
    <link href="<?= base_url('landing/') ?>assets/corporate/css/style-responsive.css" rel="stylesheet">
    <link href="<?= base_url('landing/') ?>assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?= base_url('landing/') ?>assets/corporate/css/custom.css" rel="stylesheet">
    <link href="<?= base_url('landing/') ?>assets/corporate/css/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/gridtab-v2/') ?>gridtab.min.css" />


    <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="corporate">

    <!-- BEGIN STYLE CUSTOMIZER -->

    <!-- END BEGIN STYLE CUSTOMIZER -->

    <!-- BEGIN HEADER -->
    <div class="header">
        <div class="container-fluid">
            <a class="site-logo" href="javascript:0;"><img src="<?= base_url('uploads/') ?>img/letgobeyond.png" alt="Metronic FrontEnd"> <span>CANDRA</span></a>

            <a href="https://toyotasurabayatermurah/" class="mobi-toggler"><i class="fa fa-bars"></i></a>

            <!-- BEGIN NAVIGATION -->
            <div class="header-navigation pull-right font-transform-inherit">
                <ul>
                    <li class="<?= $this->uri->segment(1) == '' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
                        <a href="https://toyotasurabayatermurah.com/">
                            Home
                        </a>
                    </li>
                    <li class="<?= $this->uri->segment(1) == 'vehicles' ? 'active' : '' ?>">
                        <a href="<?= site_url('vehicles') ?>">
                            Vehicles
                        </a>
                    </li>
                    <li class="<?= $this->uri->segment(1) == 'price-list' ? 'active' : '' ?>">
                        <a href="<?= site_url('price-list') ?>">Price List</a>
                    </li>
                    <li class="<?= $this->uri->segment(1) == 'promo-toyota' ? 'active' : '' ?>">
                        <a href="<?= site_url('promo-toyota') ?>">Promo Toyota</a>
                    </li>
                    <li class="<?= $this->uri->segment(1) == 'customer-gallery' ? 'active' : '' ?>">
                        <a href="<?= site_url('customer-gallery') ?>">Customer Gallery</a>
                    </li>
                    <!-- BEGIN TOP SEARCH -->
                    <!-- END TOP SEARCH -->
                </ul>
            </div>
            <!-- END NAVIGATION -->
        </div>
    </div>
    <!-- Header END -->
    <script src="<?= base_url('landing/') ?>assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script>
        var base_url = "<?php echo base_url(); ?>";
    </script>
    <?= $landing ?>
    <div id="fixed-social">
        <div>
            <a href="<?= site_url('test-drive') ?>" class="fixed-twitter" target="_blank"><i class="fa fa-car"></i> <span>Test Drive</span></a>
        </div>
        <div>
            <a href="<?= site_url('booking-service') ?>" class="fixed-twitter" target="_blank"><i class="fa fa-wrench"></i> <span>Booking Service</span></a>
        </div>
        <div>
            <a href="#" class="fixed-facebook" target="_blank"><i class="fa fa-facebook"></i> <span>Facebook</span></a>
        </div>

        <div>
            <a href="https://api.whatsapp.com/send?phone=6281357199161" class="fixed-gplus" target="_blank"><i class="fa fa-whatsapp"></i> <span>Chandra</span></a>
        </div>

        <div>
            <a href="#" class="fixed-instagrem" target="_blank"><i class="fa fa-instagram"></i> <span>Instagram</span></a>
        </div>


    </div>
    <!-- BEGIN FOOTER -->

    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- BEGIN COPYRIGHT -->
                <div class="col-md-4 col-sm-4 padding-top-10">
                    <script>
                        document.write(new Date().getFullYear());
                    </script> © Candra Toyota. ALL Rights Reserved.
                </div>
                <!-- END COPYRIGHT -->
                <!-- BEGIN PAYMENTS -->
                <div class="col-md-4 col-sm-4">
                    <ul class="social-footer list-unstyled list-inline text-center">
                        <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                </div>
                <!-- END PAYMENTS -->
                <!-- BEGIN POWERED -->
                <div class="col-md-4 col-sm-4 text-right">
                    <p class="powered">Powered by: <a href="https://rozitech.co.id/">Rozitech Multimedia Indonesia</a></p>
                </div>
                <!-- END POWERED -->
            </div>
        </div>
    </div>
    <!-- END FOOTER -->


    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="<?= base_url('landing/') ?>assets/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script src="<?= base_url('landing/') ?>assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>

    <script src="<?= base_url('landing/') ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url('landing/') ?>assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?= base_url('landing/') ?>assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?= base_url('landing/') ?>assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

    <script src="<?= base_url('landing/') ?>assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="<?= base_url('landing/') ?>assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>
    <script src="<?= base_url('landing/') ?>assets/pages/scripts/scripts.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>plugins/gridtab-v2/gridtab.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initOWL();
            Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            Layout.initNavScrolling();
        });
    </script>
</body>
<!-- END BODY -->

</html>