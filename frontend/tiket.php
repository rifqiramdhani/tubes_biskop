<?php require_once('frontend/template/header.php') ?>
<?php

$id_customer = $_SESSION['id_customer'];
$query = mysqli_query($koneksi, "SELECT id_customer, nama, jumlah, judul, nama_studio, jam_tayang, harga_tiket, total_harga_tiket FROM `tiket` JOIN customer USING(id_customer) JOIN detail_jadwal USING(id_dt_jadwal) JOIN film USING(id_film) JOIN studio USING(id_studio) JOIN jadwal USING(id_jadwal) WHERE id_customer = '$id_customer'");
?>

<body>
    <div class="content">
        <?php require_once('frontend/template/navbar.php') ?>

        <div class="main-content">
            <div class="min-vh-100">
                <div class="top-header">
                    <div class="logo"><a href="index.php"><img src="frontend/assets/img/logo.png"></a></div>
                </div>
                <div class="container" style="margin-top: 80px;">
                    <div class="row">
                        <div class="col">
                            <h2 class="text-center mb-5">Tiket</h2>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg-12 pl-lg-0">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <div class="table-responsive table-striped">
                                        <table class="table" id="datamakanan">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Judul</th>
                                                    <th>Studio</th>
                                                    <th>Jam Tayang</th>
                                                    <th>Harga Tiket</th>
                                                    <th>Qty</th>
                                                    <th>Total Bayar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($getdata = mysqli_fetch_assoc($query)) : ?>
                                                    <tr>
                                                        <td><?= $getdata['nama'] ?></td>
                                                        <td><?= $getdata['judul'] ?></td>
                                                        <td><?= $getdata['nama_studio'] ?></td>
                                                        <td><?= $getdata['jam_tayang'] ?></td>
                                                        <td><?= rupiah($getdata['harga_tiket']) ?></td>
                                                        <td><?= $getdata['jumlah'] ?></td>
                                                        <td><?= rupiah($getdata['total_harga_tiket']) ?></td>
                                                    </tr>

                                                <?php endwhile ?>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php require_once('frontend/template/footer.php') ?>