<?php
$query = mysqli_query($koneksi, "SELECT karyawan.*, nama_jabatan FROM `karyawan` JOIN jabatan ON id_jabatan_fore = id_jabatan");

$queryJabatan = mysqli_query($koneksi, "SELECT id_jabatan, nama_jabatan, nama_divisi FROM `jabatan` JOIN divisi USING(id_divisi)");



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $level = htmlspecialchars($_POST['level']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

    $queryCek = mysqli_query($koneksi, "SELECT * FROM admin WHERE email = '$email'");

    if (mysqli_num_rows($queryCek) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO `admin`(`nama`, `email`, `password`, `level`) VALUES ('$nama', '$email', '$password', '$level')");

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil di tambahkan';
            $_SESSION['title'] = 'Data Admin';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal di tambahkan';
            $_SESSION['title'] = 'Data Admin';
            $_SESSION['type'] = 'error';
        }
    } else {
        $_SESSION['message'] = 'Email sudah ada, data gagal di tambahkan';
        $_SESSION['title'] = 'Data Admin';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=admin';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Data Admin</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">


                <div class="form-group has-feedback">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih Level-</option>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=admin' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>