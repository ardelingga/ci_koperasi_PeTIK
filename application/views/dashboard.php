<section class="content">
        <div class="container-fluid">

            <div class="block-header">
                <h2>INPUT DATA KOPERASI</h2>
            </div>
            <!-- Widgets2 -->
            <div class="row clearfix">
                <div class="col-md-4">
                    <a href="<?=base_url("transaksi/tambah");?>">
                        <div class="info-box bg-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">loyalty</i>
                            </div>
                            <div class="content">
                                <div class="text">TRANSAKSI</div>
                                <!-- <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div> -->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?=base_url("daftar_kebutuhan/tambah");?>">
                        <div class="info-box bg-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">card_giftcard</i>
                            </div>
                            <div class="content">
                                <div class="text">DAFTAR KEBUTUHAN</div>
                                <!-- <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div> -->
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="<?=base_url("simpan_uang/tambah");?>">
                        <div class="info-box bg-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">file_upload</i>
                            </div>
                            <div class="content">
                                <div class="text">KETERANGAN INVESTASI</div>
                                <!-- <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div> -->
                            </div>
                        </div>
                    </a>
                </div>
                

                <div class="col-md-6">
                    <a href="<?=base_url("pinjam_uang/tambah");?>">
                        <div class="info-box bg-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">file_download</i>
                            </div>
                            <div class="content">
                                <div class="text">KETERANGAN PINJAM</div>
                                <!-- <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div> -->
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="<?=base_url("belanja/tambah");?>">
                        <div class="info-box bg-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">shopping_cart</i>
                            </div>
                            <div class="content">
                                <div class="text">BELANJA</div>
                                <!-- <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div> -->
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- #END# Widgets2 -->

            <br><br>

            <!-- Hover Zoom Effect -->
            <div class="block-header">
                <h2>DAFTAR RIWAYAT KOPERASI</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="<?=base_url("transaksi");?>">
                        <div class="info-box bg-teal hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">loyalty</i>
                            </div>
                            <div class="content">
                                <div class="text">TRANSAKSI</div>
                                <div class="number"><?php echo $transaksi; ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?=base_url("daftar_kebutuhan");?>">
                        <div class="info-box bg-teal hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">card_giftcard</i>
                            </div>
                            <div class="content">
                                <div class="text">DAFTAR KEBUTUHAN</div>
                                <div class="number"><?php echo $daftar_kebutuhan; ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?=base_url("simpan_uang");?>">
                        <div class="info-box bg-teal hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">file_upload</i>
                            </div>
                            <div class="content">
                                <div class="text">KETERANGAN INVESTASI</div>
                                <div class="number"><?php echo $simpan_uang; ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="<?=base_url("pinjam_uang");?>">
                        <div class="info-box bg-teal hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">file_download</i>
                            </div>
                            <div class="content">
                                <div class="text">KETERANGAN PINJAM</div>
                                <div class="number"><?php echo $pinjam_uang; ?></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="<?=base_url("belanja");?>">
                        <div class="info-box bg-teal hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">shopping_cart</i>
                            </div>
                            <div class="content">
                                <div class="text">BELANJA</div>
                                <div class="number"><?php echo $belanja; ?></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- #END# Hover Zoom Effect -->

            <br><br>

            <div class="block-header">
                <h2>DATA MASTER KOPERASI</h2>
            </div>

            <!-- Widgets1 -->
            <div class="row clearfix">
                <div class="col-md-4">
                    <a href="<?=base_url("anggota");?>">
                        <div class="info-box bg-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">people</i>
                            </div>
                            <div class="content">
                                <div class="text">ANGGOTA</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $anggota; ?>" data-speed="15" data-fresh-interval="20"><?php echo $anggota; ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?=base_url("petugas");?>">
                        <div class="info-box bg-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">person</i>
                            </div>
                            <div class="content">
                                <div class="text">PETUGAS</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $petugas; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $petugas; ?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?=base_url("barang");?>">
                        <div class="info-box bg-green hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons">forum</i>
                            </div>
                            <div class="content">
                                <div class="text">PRODUK</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $barang; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $barang; ?></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- #END# Widgets1 -->

        </div>




        <!-- <br><br><br>
        <div class="container-fluid"> -->
            <!-- Counter Examples -->
            <!-- <div class="block-header">
                <h2>
                    COUNTER ANIMATION
                    <small>Taken from <a href="https://github.com/mhuggins/jquery-countTo" target="_blank">github.com/mhuggins/jquery-countTo</a></small>
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW ORDERS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">125</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW MEMBERS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple">
                        <div class="icon">
                            <i class="material-icons">bookmark</i>
                        </div>
                        <div class="content">
                            <div class="text">BOOKMARKS</div>
                            <div class="number count-to" data-from="0" data-to="117" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-purple">
                        <div class="icon">
                            <i class="material-icons">favorite</i>
                        </div>
                        <div class="content">
                            <div class="text">LIKES</div>
                            <div class="number count-to" data-from="0" data-to="1432" data-speed="1500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- #END# Counter Examples -->
            <!-- Hover Zoom Effect -->
            <!-- <div class="block-header">
                <h2>HOVER ZOOM EFFECT</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">MESSAGES</div>
                            <div class="number">15</div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">devices</i>
                        </div>
                        <div class="content">
                            <div class="text">CPU USAGE</div>
                            <div class="number">92%</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">access_alarm</i>
                        </div>
                        <div class="content">
                            <div class="text">ALARM</div>
                            <div class="number">07:00 AM</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">gps_fixed</i>
                        </div>
                        <div class="content">
                            <div class="text">LOCATION</div>
                            <div class="number">Turkey</div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- #END# Hover Zoom Effect -->
            <!-- Hover Expand Effect -->
            <!-- <div class="block-header">
                <h2>HOVER EXPAND EFFECT</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">BOUNCE RATE</div>
                            <div class="number">62%</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">flight_takeoff</i>
                        </div>
                        <div class="content">
                            <div class="text">FLIGHT</div>
                            <div class="number">02:59 PM</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">BATTERY</div>
                            <div class="number">Charging</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-lime hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">brightness_low</i>
                        </div>
                        <div class="content">
                            <div class="text">BRIGHTNESS RATE</div>
                            <div class="number">40%</div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- #END# Hover Expand Effect -->
            <!-- Chart Samples -->
            <!-- <div class="block-header">
                <h2>CHART SAMPLES</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow">
                        <div class="icon">
                            <div class="chart chart-bar">6,4,8,6,8,10,5,6,7,9,5</div>
                        </div>
                        <div class="content">
                            <div class="text">WEBSITE TRAFFICS</div>
                            <div class="number">127 526</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-amber">
                        <div class="icon">
                            <div class="chart chart-bar">6,4,8,6,8,10,5,6,7,9,5</div>
                        </div>
                        <div class="content">
                            <div class="text">WEBSITE IMPRESSIONS</div>
                            <div class="number">457 512</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange">
                        <div class="icon">
                            <div class="chart chart-pie">30, 35, 25, 8</div>
                        </div>
                        <div class="content">
                            <div class="text">USAGE</div>
                            <div class="number">98%</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-orange">
                        <div class="icon">
                            <div class="chart chart-pie">30, 35, 25, 10</div>
                        </div>
                        <div class="content">
                            <div class="text">USAGE</div>
                            <div class="number">100%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-brown">
                        <div class="icon">
                            <span class="chart chart-line">9,4,6,5,6,4,7,3</span>
                        </div>
                        <div class="content">
                            <div class="text">DAILY SALES</div>
                            <div class="number">$12 526</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-grey">
                        <div class="icon">
                            <span class="chart chart-line">9,4,6,5,6,4,7,3</span>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL SALES</div>
                            <div class="number">$125 543</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey">
                        <div class="icon">
                            <div class="chart chart-bar">4,6,-3,-1,2,-2,4,3,6,7,-2,3</div>
                        </div>
                        <div class="content">
                            <div class="text">CURRENCY</div>
                            <div class="number">$1 063</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-black">
                        <div class="icon">
                            <div class="chart chart-bar">4,6,-3,-1,2,-2,4,3,6,7,-2,3</div>
                        </div>
                        <div class="content">
                            <div class="text">CURRENCY</div>
                            <div class="number">$1 125</div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- #END# Chart Samples -->
        </div>
    </section>

    <!-- Jquery Core Js -->
<script src="<?=base_url('plugins/jquery/jquery.min.js');?>"></script>

<!-- Bootstrap Core Js -->
<script src="<?=base_url('plugins/bootstrap/js/bootstrap.js');?>"></script>

<!-- Select Plugin Js -->
<script src="<?=base_url('plugins/bootstrap-select/js/bootstrap-select.js');?>"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?=base_url('plugins/jquery-slimscroll/jquery.slimscroll.js');?>"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?=base_url('plugins/node-waves/waves.js');?>"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?=base_url('plugins/jquery-countto/jquery.countTo.js');?>"></script>

<!-- Morris Plugin Js -->
<script src="<?=base_url('plugins/raphael/raphael.min.js');?>"></script>
<script src="<?=base_url('plugins/morrisjs/morris.js');?>"></script>

<!-- ChartJs -->
<script src="<?=base_url('plugins/chartjs/Chart.bundle.js');?>"></script>

<!-- Flot Charts Plugin Js -->
<script src="<?=base_url('plugins/flot-charts/jquery.flot.js');?>"></script>
<script src="<?=base_url('plugins/flot-charts/jquery.flot.resize.js');?>"></script>
<script src="<?=base_url('plugins/flot-charts/jquery.flot.pie.js');?>"></script>
<script src="<?=base_url('plugins/flot-charts/jquery.flot.categories.js');?>"></script>
<script src="<?=base_url('plugins/flot-charts/jquery.flot.time.js');?>"></script>

<!-- Input Mask Plugin Js -->
<script src="<?=base_url('plugins/jquery-inputmask/jquery.inputmask.bundle.js');?>"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="<?=base_url('plugins/jquery-sparkline/jquery.sparkline.js');?>"></script>

<!-- Custom Js -->
<script src="<?=base_url('js/admin.js');?>"></script>

<!-- Demo Js -->
<script src="<?=base_url('js/demo.js');?>"></script>
</body>

</html>