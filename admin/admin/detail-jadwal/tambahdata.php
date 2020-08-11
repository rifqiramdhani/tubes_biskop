<?php
$queryFilm = mysqli_query($koneksi, "SELECT * FROM film");
$queryJadwal = mysqli_query($koneksi, "SELECT * FROM jadwal ORDER BY jam_tayang ASC");
$queryStudio = mysqli_query($koneksi, "SELECT * FROM studio ORDER BY nama_studio ASC");
$id_admin = $_SESSION['id_admin'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_film = htmlspecialchars($_POST['film']);
    $id_jadwal = htmlspecialchars($_POST['jadwal']);
    $id_studio = htmlspecialchars($_POST['studio']);


    $sql = mysqli_query($koneksi, "INSERT INTO `detail_jadwal`(`id_admin`, `id_jadwal`, `id_film`, `id_studio`) VALUES ('$id_admin', '$id_jadwal', '$id_film', '$id_studio')");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil di tambahkan';
        $_SESSION['title'] = 'Data Detail Jadwal';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal di tambahkan';
        $_SESSION['title'] = 'Data Detail Jadwal';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=detail-jadwal';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Detail Jadwal</strong></div>
        <div class="card-body">
            <form action="#" method="post">
                <div class="form-group has-feedback">
                    <label for="film">Film</label>
                    <select name="film" id="film" class="form-control" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih Film-</option>
                        <?php while ($getFilm = mysqli_fetch_assoc($queryFilm)) : ?>
                            <option value="<?= $getFilm['id_film'] ?>"><?= $getFilm['judul'] ?></option>
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
                            <option value="<?= $getStudio['id_studio'] ?>"><?= $getStudio['nama_studio'] ?></option>
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
                            <option value="<?= $getJadwal['id_jadwal'] ?>"><?= date('H:i', strtotime($getJadwal['jam_tayang'])) ?></option>
                        <?php endwhile ?>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=detail-jadwal' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>