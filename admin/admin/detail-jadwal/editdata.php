<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM `detail_jadwal` WHERE `id_dt_jadwal` = '$id'");
$getdata = mysqli_fetch_assoc($query);

$queryFilm = mysqli_query($koneksi, "SELECT * FROM film");
$queryJadwal = mysqli_query($koneksi, "SELECT * FROM jadwal");
$queryStudio = mysqli_query($koneksi, "SELECT * FROM studio ORDER BY id_studio ASC");
$id_admin = $_SESSION['id_admin'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_film = htmlspecialchars($_POST['film']);
    $id_jadwal = htmlspecialchars($_POST['jadwal']);
    $id_studio = htmlspecialchars($_POST['studio']);


    $sql = mysqli_query($koneksi, "UPDATE `detail_jadwal` SET `id_admin`='$id_admin',`id_jadwal`='$id_jadwal',`id_film`='$id_film',`id_studio`='$id_studio' WHERE `id_dt_jadwal` = '$id'");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diubah';
        $_SESSION['title'] = 'Data Detail Jadwal';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal diubah';
        $_SESSION['title'] = 'Data Detail Jadwal';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=detail-jadwal';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Ubah Detail Jadwal</strong></div>
        <div class="card-body">
            <form action="#" method="post">

                <div class="form-group has-feedback">
                    <label for="film">Film</label>
                    <select name="film" id="film" class="form-control" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih Film-</option>
                        <?php while ($getFilm = mysqli_fetch_assoc($queryFilm)) : ?>
                            <option value="<?= $getFilm['id_film'] ?>" <?= $getdata['id_film'] == $getFilm['id_film'] ? 'selected' : '' ?>><?= $getFilm['judul'] ?></option>
                        <?php endwhile ?>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="studio">Studio</label>
                    <select name="studio" id="studio" class="form-control" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih Studio-</option>
                        <?php while ($getStudio = mysqli_fetch_assoc($queryStudio)) : ?>
                            <option value="<?= $getStudio['id_studio'] ?>" <?= $getdata['id_studio'] == $getStudio['id_studio'] ? 'selected' : '' ?>><?= $getStudio['nama_studio'] ?></option>
                        <?php endwhile ?>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="jadwal">Jadwal</label>
                    <select name="jadwal" id="jadwal" class="form-control" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih Jadwal-</option>
                        <?php while ($getJadwal = mysqli_fetch_assoc($queryJadwal)) : ?>
                            <option value="<?= $getJadwal['id_jadwal'] ?>" <?= $getdata['id_jadwal'] == $getJadwal['id_jadwal'] ? 'selected' : '' ?>><?= date('H:i', strtotime($getJadwal['jam_tayang'])) ?></option>
                        <?php endwhile ?>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="button" id="ubahdetailjadwal" data-nama="Detail Jadwal"  class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=detail-jadwal' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>