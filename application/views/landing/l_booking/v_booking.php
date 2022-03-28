<div class="main">
    <div class="bread">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="https://toyotasurabayatermurah.com/">Home</a></li>
                <li class="active">Booking Service</li>
            </ul>
        </div>
    </div>
    <div class="jumbotron book-serve-jumbotron">
    </div>
    <div class="container">

        <div class="row margin-bottom-40 booking_form">
            <!-- BEGIN CONTENT -->
            <h3>Booking Service</h3>
            <p>Untuk melakukan servis kendaraan Anda, silakan isi Form dibawah ini, representatif TOYOTA akan menghubungi Anda segera.</p>
            <div class="content-page">
                <form class="whatsapp-form">
                    <div class="row">

                        <div class="col-md-6 col-sm-6">
                            <h4>Booking Information</h4>
                            <!-- BEGIN FORM-->
                            <div class="form-group">
                                <label for="contacts-name">Dealer*</label>
                                <input class="validate form-control" id="dealer" name="dealer" required="" type="text" value='Liek Motor Indrapura' readonly>
                            </div>

                            <div class="form-group">
                                <label for="contacts-name">Product*</label>
                                <select id="product" class="form-control" required>
                                    <option hidden='hidden' selected='selected' value='default'>Product</option>
                                    <?php foreach ($mobil->result() as $mob) { ?>
                                        <option value="<?= $mob->vehicles_id; ?>"><?= $mob->nama; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contacts-name">Product Type*</label>
                                <select id="product_type" class="form-control">
                                    <option hidden='hidden' selected='selected' value='default'>Product Type</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nopol">No Polisi*</label>
                                <input class="validate form-control" id="nopol" name="nopol" required="" type="text" value='' />
                            </div>
                            <div class="form-group">
                                <label for="nama_stnk">Atas Nama Pada STNK*</label>
                                <input class="validate form-control" id="nama_stnk" name="nama_stnk" required="" type="text" value='' />
                            </div>

                            <div class="form-group">
                                <label for="contacts-name">Type Service*</label>
                                <input class="validate form-control" id="type_service" name="type_service" required="" type="text" value='' />

                            </div>
                            <div class="form-group">
                                <label for="tanggal_service">Tanggal*</label>
                                <input class="validate form-control" id="tanggal_service" name="tanggal_service" required="" type="date" value='' />
                            </div>
                            <div class="form-group">
                                <label for="jam_service">Jam*</label>
                                <input class="validate form-control" id="jam_service" name="jam_service" required="" type="time" value='' />
                            </div>
                            <div class="form-group">
                                <label for="masalah">Masalah pada mobil anda*</label>
                                <textarea name="masalah" id="masalah" rows="5" class="form-control"></textarea>
                            </div>


                            <!-- END FORM-->
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <h4 style="font-weight: 500;">Personal Information</h4>
                            <div class="form-group">
                                <label for="nama">Nama*</label>
                                <input class="validate form-control" id="nama" name="nama" required="" type="text" value='' />
                            </div>

                            <div class="form-group">
                                <label>Email*</label>
                                <input class="validate form-control" id="email" name="email" required="" type="email" value='' />
                            </div>
                            <div class="form-group">
                                <label>No Handphone*</label>
                                <input class="validate form-control" id="wa_number" name="wa_number" required="" type="number" value='' />
                            </div>
                            <div class="form-group">
                                <span>*) Tanggal Booking Service melalui website paling cepat 1 hari setelah tanggal hari pengisian form Booking Online ini. Terima Kasih atas kepercayaan Anda bersama Toyota.</span>
                                <br>
                                <span>*) Fast Respon langsung hubungi</span>
                                <a href="tel:+6281357199161" class="btn btn-phone mb-1 DM-phone-modelmobil" target="_blank" rel="nofollow">
                                    <i class="glyphicon glyphicon-phone"></i>
                                   0813-5719-9161 </a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="send_booking btn btn-primary btn-rounded" id="send_booking"><i class="icon-ok"></i>Submit</button>
                                <button type="reset" class="btn btn-default btn-rounded">Reset</button>
                            </div>
                            <div id="text-info"></div>
                        </div>

                    </div>
                </form>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
</div>