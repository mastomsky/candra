<div class="main">
    <div class="bread">

        <div class="container">
            <ul class="breadcrumb">
                <li><a href="https://toyotasurabayatermurah.com/">Home</a></li>
                <li class="active">Toyota Vehicles</li>
            </ul>
        </div>
    </div>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40 margin-top-10">
        <!-- BEGIN CONTENT -->
        <div class="container">
            <div class="row mb-5">
                <h2 class="text-center">Toyota Vehicles</h2>
            </div>
            <div class="row mt-5">
                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Search</span>
                            <input type="text" name="search_text" id="search_text" placeholder="Search Car Name" class="form-control" />
                        </div>
                    </div>


                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="text-decoration: none;">
                                        Category Vehicles <i class="pull-right fa fa-plus-circle"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="list-group">
                                        <?php
                                        foreach ($category->result() as $row) {
                                        ?>
                                            <div class="list-group-item checkbox">
                                                <label><input type="checkbox" class="common_selector category" value="<?= $row->category_id ?>"> <?= $row->nama ?></label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="vehicles-grid filter_data">

                    </div>
                </div>
                <div class="row text-center mt-lg-5">
                    <nav aria-label="...">
                        <div id="pagination_link">
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>