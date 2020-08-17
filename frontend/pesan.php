<?php require_once('frontend/template/header.php') ?>

<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM film WHERE id_film = '$id'");
$getdata = mysqli_fetch_assoc($query);

$queryStudio =
    mysqli_query($koneksi, "SELECT * FROM studio ORDER BY nama_studio ASC");
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
                            <h2 class="text-center mb-5">Pesan Tiket</h2>
                        </div>
                    </div>
                    <form action="frontend/olahdata/pesan_tiket.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-5">
                            <div class="col-lg-4 pl-lg-0">
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <strong>Pilih Jadwal</strong>
                                            <hr>
                                            <?php
                                            while ($getStudio = mysqli_fetch_assoc($queryStudio)) :
                                                $id_studio = $getStudio['id_studio'];

                                                $queryJadwal = mysqli_query($koneksi, "SELECT id_dt_jadwal, jam_tayang, nama_studio FROM `detail_jadwal` JOIN jadwal USING(id_jadwal) JOIN studio USING(id_studio) WHERE id_film = '$id' AND id_studio = '$id_studio'");
                                            ?>


                                                <?php if (mysqli_num_rows($queryJadwal) > 0) : ?>
                                                    <label for="" style="font-size: 12px;font-weight:bold"><?= $getStudio['nama_studio'] ?></label>
                                                    <div class="row">
                                                        <?php while ($getJadwal = mysqli_fetch_assoc($queryJadwal)) : ?>
                                                            <div class="col-lg-4">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="mt-2"><?= date('H:i', strtotime($getJadwal['jam_tayang'])) ?> WIB
                                                                        <input style="display:block; margin: auto;" type="radio" name="id_jadwal" value="<?= $getJadwal['id_dt_jadwal'] ?>" required />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        <?php endwhile ?>
                                                    </div>
                                                <?php endif ?>
                                            <?php endwhile ?>

                                        </div>

                                        <div class="form-group">
                                            <strong>Jumlah Tiket</strong>
                                            <hr>
                                            <div class="form-group">
                                                <input type="number" min="1" id="jumlah" class="form-control" name="jumlah" placeholder="Masukan Jumlah" readonly>
                                            </div>

                                            <div class="form-group">
                                                <input type="text"  class="form-control" name="total_harga" id="total_harga" placeholder="Total harga" readonly>
                                            </div>
                                            <input type="hidden" value="<?= $id ?>" name="id_film">
                                        </div>


                                        <?php if (empty($_SESSION['email_customer'])) : ?>
                                            <div class="form-group">
                                                <strong>Data Diri</strong>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control" name="nama" id="nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telepon">No Telepon</label>
                                                    <input type="text" class="form-control" name="telepon" id="telepon" required>
                                                </div>

                                            </div>
                                        <?php endif ?>

                                    </div>
                                    <div class="card-footer"></div>
                                </div>
                            </div>

                            <div class="col-lg-4 pl-lg-0">
                                <div class="card border-primary">
                                    <div class="card-header">
                                        <strong>Pilih Kursi</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php $kursi = ['J', 'I', 'H', 'G', 'F', 'E', 'D', 'C', 'B', 'A'] ?>
                                            <?php
                                            for ($i = 0; $i < 10; $i++) {
                                                for ($j = 1; $j < 5; $j++) {
                                            ?>
                                                    <div class="col-lg-3 mt-2">
                                                        <div class="form-check form-check-inline ml-3">
                                                            <label class="mt-2"><?= $kursi[$i] . '00' . $j ?>
                                                                <input style="display:block; margin: auto;" type="checkbox" name="kursi[]" value="<?= $kursi[$i] . '00' . $j ?>"/>
                                                            </label>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            }

                                            ?>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <span style="font-size: 13px;">Layar Bioskop</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card border-primary car-list mt-0">
                                    <div class="card-header">
                                        <strong>Film</strong>
                                    </div>
                                    <div class="card-body text-center"><img class="img-thumbnail" src="<?= BASE_URL . 'assets/img/film/' . $getdata['direktori'] ?>" width="200px">
                                        <p><?= $getdata['judul'] ?></p>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" id="pesansekarang" class="btn btn-primary btn-block p-3" style="font-size: 15px; font-weight: 500">Pesan Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php require_once('frontend/template/footer.php') ?>