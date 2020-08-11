<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM `paket_makanan` WHERE `id_paket_makanan` = '$id'");
$getdata = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_paket_makanan = htmlspecialchars($_POST['nama_paket_makanan']);
    $harga = htmlspecialchars($_POST['harga']);
    $stok = htmlspecialchars($_POST['stok']);

    $sql = mysqli_query($koneksi, "UPDATE `paket_makanan` SET `nama_paket_makanan`='$nama_paket_makanan',`harga`='$harga',`stok`='$stok' WHERE `id_paket_makanan` = '$id'");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diubah';
        $_SESSION['title'] = 'Data Paket Makanan';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal diubah';
        $_SESSION['title'] = 'Data Paket Makanan';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=paket-makanan';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Ubah Data Paket Makanan</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">

                <div class="form-group has-feedback">
                    <label for="nama_paket_makanan">Nama Paket</label>
                    <input type="text" class="form-control" id="nama_paket_makanan" value="<?= $getdata['nama_paket_makanan'] ?>" name="nama_paket_makanan" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="harga">Harga</label>
                    <input type="number" min="0" class="form-control" id="harga" value="<?= $getdata['harga'] ?>" name="harga" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="stok">Stok</label>
                    <input type="number" min="0" class="form-control" id="stok" value="<?= $getdata['stok'] ?>" name="stok" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>


                <div class="form-group mx-auto">
                    <button type="button" id="ubahmakanan" data-nama="<?= $getdata['nama_paket_makanan'] ?>" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=paket-makanan' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>