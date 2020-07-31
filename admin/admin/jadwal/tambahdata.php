<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jam_tayang = htmlspecialchars($_POST['jam_tayang']);


    $sql = mysqli_query($koneksi, "INSERT INTO `jadwal`(`jam_tayang`) VALUES ('$jam_tayang')");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil di tambahkan';
        $_SESSION['title'] = 'Data Jadwal';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal di tambahkan';
        $_SESSION['title'] = 'Data Jadwal';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=jadwal';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Jadwal</strong></div>
        <div class="card-body">
            <form action="#" method="post" >

                <div class="form-group has-feedback">
                    <label for="jam_tayang">Jam Tayang</label>
                    <input type="text" class="form-control" id="timepicker" name="jam_tayang" data-required-error="Data tidak boleh kosong" onkeypress="return false" required>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=jadwal' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>