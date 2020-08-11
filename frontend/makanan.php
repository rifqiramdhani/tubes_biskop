<?php require_once('frontend/template/header.php') ?>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM paket_makanan WHERE stok > 0");

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
                            <h2 class="text-center mb-5">Daftar Paket Makanan</h2>
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
                                                    <th>Nama Paket</th>
                                                    <th>Harga</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($getdata = mysqli_fetch_assoc($query)) : ?>
                                                    <tr>
                                                        <td><?= $getdata['nama_paket_makanan'] ?></td>
                                                        <td><?= rupiah($getdata['harga']) ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-custom col-orange btn-block" data-toggle="modal" data-target="#modalmakanan<?= $getdata['id_paket_makanan'] ?>">Pesan</a>
                                                        </td>
                                                    </tr>

                                                <?php include('modalpesan.php');
                                                endwhile ?>
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