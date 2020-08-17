<?php
$id_struk = isset($_GET['id']) ? $_GET['id'] : false;

$query = mysqli_query($koneksi, "SELECT * FROM `struk` join paket_makanan using(id_paket_makanan) where id_struk = '$id_struk'");
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
                            <td>ID Struk</td>
                            <td><?= $getdata['id_struk'] ?></td>
                        </tr>

                        <tr>
                            <td>Nama Customer</td>
                            <td><?= $getdata['nama'] ?></td>
                        </tr>

                        <tr>
                            <td>Nama Paket Makanan</td>
                            <td><?= $getdata['nama_paket_makanan'] ?></td>
                        </tr>

                        <tr>
                            <td>Jumlah</td>
                            <td><?= $getdata['qty'] ?></td>
                        </tr>

                        <tr>
                            <td>Harga Paket</td>
                            <td><?= $getdata['harga'] ?></td>
                        </tr>

                        <tr>
                            <td>Total Harga</td>
                            <td><?= $getdata['total_harga'] ?></td>
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