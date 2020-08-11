<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id'");
$getdata = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $level = htmlspecialchars($_POST['level']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

    if(empty($password)){
        $sql = mysqli_query($koneksi, "UPDATE `admin` SET `nama`='$nama',`email`='$email',`level`='$level' WHERE id_admin = '$id'");
    }else{
        $sql = mysqli_query($koneksi, "UPDATE `admin` SET `nama`='$nama',`email`='$email',`password`='$password',`level`='$level' WHERE id_admin = '$id'");
    }

    if ($sql) {
        $_SESSION['message'] = 'Data berhasil diubah';
        $_SESSION['title'] = 'Data Admin';
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = 'Data gagal diubah';
        $_SESSION['title'] = 'Data Admin';
        $_SESSION['type'] = 'error';
    }

    echo "<script>window.location.href = '?page=admin';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Ubah Data Admin</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form">
                <div class="form-group has-feedback">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" value="<?= $getdata['nama'] ?>" name="nama" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih Level-</option>
                        <option value="admin" <?= $getdata['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="kasir" <?= $getdata['level'] == 'kasir' ? 'selected' : '' ?>>Kasir</option>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="<?= $getdata['email'] ?>" name="email" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak diubah">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>



                <div class="form-group mx-auto">
                    <button type="button" data-nama="<?= $getdata['nama'] ?>" id="ubahadmin" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=admin' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>