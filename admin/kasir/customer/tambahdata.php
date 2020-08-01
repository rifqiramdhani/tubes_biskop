<?php
$query = mysqli_query($koneksi, "SELECT karyawan.*, nama_jabatan FROM `karyawan` JOIN jabatan ON id_jabatan_fore = id_jabatan");

$queryJabatan = mysqli_query($koneksi, "SELECT id_jabatan, nama_jabatan, nama_divisi FROM `jabatan` JOIN divisi USING(id_divisi)");



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $no_telepon = htmlspecialchars($_POST['no_telepon']);
    $tempat_tanggal_lahir = htmlspecialchars($_POST['tempat_tanggal_lahir']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $jenis_kelamin = $_POST['jenis_kelamin']; //detail jabatan

    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

    $id_admin = $_SESSION['id_admin'];

    $sql = mysqli_query($koneksi, "INSERT INTO `customer`(`id_admin`, `email`, `password`, `nama`, `alamat`, `no_telepon`, `jenis_kelamin`, `tempat_tanggal_lahir`, `status`) VALUES ('$id_admin', '$email', '$password', '$nama', '$alamat', '$no_telepon', '$jenis_kelamin', '$tempat_tanggal_lahir', 'member')");

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil di tambahkan';
        $_SESSION['title'] = 'Data Customer';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal di tambahkan';
        $_SESSION['title'] = 'Data Customer';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=customer';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Tambah Data Customer</strong></div>
        <div class="card-body">
            <form action="#" class="form-row" method="post" data-toggle="validator" role="form">

                <div class="col-6">

                    <div class="form-group has-feedback">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="no_telepon">No Telepon</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="tempat_tanggal_lahir">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" data-required-error="Data tidak boleh kosong" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group has-feedback">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" data-required-error="Data tidak boleh kosong" required>
                            <option value="">-Pilih Jenis Kelamin-</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
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
                </div>

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=customer' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>