<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM `jadwal` WHERE `id_jadwal` = '$id'");
$getdata = mysqli_fetch_assoc($query);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $tanggal = htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal'])));
    $jam_tayang = htmlspecialchars($_POST['jam_tayang']);

    $sql = mysqli_query($koneksi, "UPDATE `jadwal` SET `jam_tayang`='$jam_tayang' WHERE `id_jadwal` = '$id'");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diubah';
        $_SESSION['title'] = 'Data Jadwal';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal diubah';
        $_SESSION['title'] = 'Data Jadwal';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=jadwal';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Ubah Jadwal</strong></div>
        <div class="card-body">
            <form action="#" method="post">

                <div class="form-group has-feedback">
                    <label for="jam_tayang">Jam Tayang</label>
                    <input type="text" class="form-control" id="timepicker" name="jam_tayang" value="<?= date('H:i', strtotime($getdata['jam_tayang'])) ?>" data-required-error="Data tidak boleh kosong" onkeypress="return false" required>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="button" id="ubahjadwal" data-nama="<?= date('H:i', strtotime($getdata['jam_tayang'])) ?>" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=jadwal' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>