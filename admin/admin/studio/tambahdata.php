<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_studio = htmlspecialchars($_POST['nama_studio']);
    

    $queryCek = mysqli_query($koneksi, "SELECT * FROM `studio` WHERE `nama_studio` = '$nama_studio'");

    if (mysqli_num_rows($queryCek) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO `studio`(`nama_studio`) VALUES ('$nama_studio')");

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil di tambahkan';
            $_SESSION['title'] = 'Data Studio';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal di tambahkan';
            $_SESSION['title'] = 'Data Studio';
            $_SESSION['type'] = 'error';
        }
    } else {
        $_SESSION['message'] = 'Nama studio sudah ada, data gagal di tambahkan';
        $_SESSION['title'] = 'Data Studio';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=studio';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Studio</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">


                <div class="form-group has-feedback">
                    <label for="nama_studio">Nama Studio</label>
                    <input type="text" class="form-control" id="nama_studio" name="nama_studio" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=studio' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>