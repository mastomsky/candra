<div class="main">
    <div class="bread">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="https://toyotasurabayatermurah.com/">Home</a></li>
                <li class="active">Test Drive</li>
            </ul>
        </div>
    </div>
    <div class="jumbotron book-serve-jumbotron">
    </div>
    <div class="container">

        <div class="row margin-bottom-40 booking_form">
            <!-- BEGIN CONTENT -->
            <h3>Booking Test Drive</h3>
            <p>Untuk melakukan test drive, silakan isi Form dibawah ini:</p>
            <div class="content-page">
                <form class="whatsapp-form">
                    <div class="row">

                        <div class="col-md-6 col-sm-6">
                            <h4>Booking Information</h4>
                            <!-- BEGIN FORM-->
                            <div class="form-group">
                                <h4>Kebutuhan</h4>
                                <div class="form-group">
                                    <input class="validate form-control" id="kebutuhan" name="kebutuhan" type="text" value="Individu" readonly style="background: #fff;" />
                                </div>
                            </div>

                            <div class="form-group">
                                <h4 for="contacts-name">Informasi Product & Spesifikasi*</h4>
                                <input class="validate form-control" id="informasi" name="informasi" type="text" value="Booking Test Drive" readonly style="background: #fff;" />

                            </div>
                            <div class="form-group">
                                <h4>Waktu Perkiraan Pembelian Mobil</h4>
                                <select id="perkiraan" class="form-control" required>
                                    <option hidden='hidden' selected='selected' value='default'>Pilih Perkiraan Waktu</option>
                                    <option value="Kurang dari 1 Minggu">
                                        < Minggu</option>
                                    <option value="1 Minggu - 1 Bulan">1 Minggu - 1 Bulan</option>
                                    <option value="Lebih dari 1 Bulan">Lebih dari 1 Bulan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <h4 style="font-weight: 500;">Personal Information</h4>
                            <div class="form-group">
                                <label for="nama">Nama*</label>
                                <input class="validate form-control" id="nama" name="nama" required="" type="text" value='' />
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat*</label>
                                <input class="validate form-control" id="alamat" name="alamat" required="" type="text" value='' />
                            </div>
                            <div class="form-group">
                                <label>No Handphone*</label>
                                <input class="validate form-control" id="wa_number" name="wa_number" required="" type="number" value='' />
                                <span>Nomor Handphone diawali dengan 62</span>

                            </div>
                            <div class="form-group">
                                <label>Email*</label>
                                <input class="validate form-control" id="email" name="email" required="" type="email" value='' />
                            </div>
                            <div class="form-group">
                                <label for="">Kota</label>
                                <input type="text" name="kota" id="kota" class="form-control" value="Surabaya" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Dealer</label>
                                <input type="text" name="dealer" id="dealer" value="Liek Motor Indrapura" class="form-control" readonly>
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
                                <span> <strong>Catatan:</strong> <br> Saya mengizinkan Toyota dan mitranya untuk menghubungi Saya dalam membantu proses pembelian mobil Toyota. Dengan memberikan email dan no handphone, saya telah menyetujui untuk menerima semua pemberitahuan melalui Toyota.</span>
                                <br>
                                <span>*) Fast Respon langsung hubungi</span>
                                <a href="tel:+6281357199161" class="btn btn-phone mb-1 DM-phone-modelmobil" target="_blank" rel="nofollow">
                                    <i class="glyphicon glyphicon-phone"></i>
                                    0813-5719-9161 </a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="send_test_drive btn btn-primary btn-rounded" id="send_test_drive"><i class="icon-ok"></i>Submit</button>
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