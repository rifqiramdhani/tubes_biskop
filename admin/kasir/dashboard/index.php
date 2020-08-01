<?php
$queryCus = mysqli_query($koneksi, "SELECT COUNT(id_customer) as jumlah FROM `customer`");
$getCus = mysqli_fetch_assoc($queryCus);

$querystruk = mysqli_query($koneksi, "SELECT COUNT(id_struk) as jumlah FROM `struk`");
$getstruk = mysqli_fetch_assoc($querystruk);

$queryTiket = mysqli_query($koneksi, "SELECT COUNT(id_tiket) as jumlah FROM `tiket`");
$getTiket = mysqli_fetch_assoc($queryTiket);

?>

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-xs-12  mx-auto">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="fas fa-film"></i>
                    </div>
                    <div class="content">
                        <div class="text text-white">CUSTOMER</div>
                        <div class="number count-to  text-white" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $getCus['jumlah'] ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12  mx-auto">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="content">
                        <div class="text text-white">PAKET MAKANAN TERJUAL</div>
                        <div class="number count-to  text-white" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $getstruk['jumlah'] ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12  mx-auto">
                <div class="info-box bg-green hover-expand-effect">
                    <div class="icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="content">
                        <div class="text text-white">TIKET TERJUAL</div>
                        <div class="number count-to  text-white" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $getTiket['jumlah'] ?></div>
                    </div>
                </div>
            </div>

            <!--/.col-->
        </div>
        <!--/.row-->

        <!--/.row-->
    </div>

</div>