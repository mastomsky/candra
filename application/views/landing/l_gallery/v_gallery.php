<div class="main">
    <div class="bread">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="https://toyotasurabayatermurah.com/">Home</a></li>
                <li class="active">Customer Gallery</li>
            </ul>
        </div>
    </div>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="container">

        <div class="row margin-bottom-40 margin-top-10">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12">
                <h1>Customer Gallery</h1>
                <div class="content-page">
                    <div class="row margin-bottom-40">
                        <?php foreach ($gallery as $val) { ?>
                            <div class="col-md-3 col-sm-4 gallery-item">
                                <a data-rel="fancybox-button" href="<?= base_url('uploads/portfolio/' . $val->foto) ?>" class="fancybox-button">
                                    <img alt="" src="<?= base_url('uploads/portfolio/' . $val->foto) ?>" class="img-responsive">
                                    <div class="zoomix"><i class="fa fa-search"></i></div>
                                </a>
                            </div>
                        <?php                        } ?>

                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
</div>