<?php
$id_tiket = isset($_GET['id']) ? $_GET['id'] : false;
$nama = isset($_GET['nama']) ? $_GET['nama'] : false;
$telepon = isset($_GET['telepon']) ? $_GET['telepon'] : false;

$query = mysqli_query($koneksi, "SELECT id_tiket, nama_studio,  judul, no_kursi, jam_tayang, harga_tiket, total_harga_tiket   FROM `tubes_bioskop`.`tiket` JOIN detail_jadwal USING(id_dt_jadwal) JOIN film USING(id_film) JOIN studio USING(id_studio) JOIN jadwal USING(id_jadwal) WHERE id_tiket = '$id_tiket'");
$getdata = mysqli_fetch_assoc($query);

?>

<?php require_once('frontend/template/header.php') ?>
<?php require_once('function/helper.php') ?>

<body>
    <div class="min-vh-100">
        <div class="container" style="margin-top: 80px;">
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Struk Tagihan</h2>
                </div>
            </div>
            <div class="table-responsive col-5 mx-auto table-striped text-center">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>ID Tiket</td>
                            <td><?= $getdata['id_tiket'] ?></td>
                        </tr>

                        <tr>
                            <td>Nama</td>
                            <td><?= $nama ?></td>
                        </tr>

                        <tr>
                            <td>No Telepon</td>
                            <td><?= $telepon ?></td>
                        </tr>

                        <tr>
                            <td>Judul</td>
                            <td><?= $getdata['judul'] ?></td>
                        </tr>

                        <tr>
                            <td>Studio</td>
                            <td><?= $getdata['nama_studio'] ?></td>
                        </tr>

                        <tr>
                            <td>No Kursi</td>
                            <td><?= $getdata['no_kursi'] ?></td>
                        </tr>

                        <tr>
                            <td>Jam Tayang</td>
                            <td><?= $getdata['jam_tayang'] ?></td>
                        </tr>

                        <tr>
                            <td>Harga Tiket</td>
                            <td><?= rupiah($getdata['harga_tiket']) ?></td>
                        </tr>

                        <tr>
                            <td>Total Bayar</td>
                            <td><?= rupiah($getdata['total_harga_tiket']) ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="index.php" class="btn mx-auto btn-sm btn-primary"><i class="fas fa-reply"></i> Kembali</a>
                <button type="button" onclick="window.print();" class="btn mx-auto btn-sm btn-warning"><i class="fas fa-print"></i> Print</button>
            </div>

        </div>
    </div>

    <script>
        window.print();
    </script>
    <?php require_once('frontend/template/footer.php') ?>