<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM film WHERE id_film = '$id'");
$getdata = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = htmlspecialchars($_POST['judul']);
    $durasi = htmlspecialchars($_POST['durasi']);
    $genre = htmlspecialchars($_POST['genre']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $tanggal_tayang = htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal_tayang'])));
    $foto_film = $_FILES['foto_film'];

    if (empty($foto_film['name'])) {
        $sql = mysqli_query($koneksi, "UPDATE `film` SET `judul`='$judul',`durasi`='$durasi',`genre`='$genre',`kategori`='$kategori' ,`tanggal_tayang`='$tanggal_tayang' WHERE `id_film` = '$id'");

        if ($sql) {
            $_SESSION['message'] = 'Data berhasil di ubah';
            $_SESSION['title'] = 'Data Film';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Data gagal di ubah';
            $_SESSION['title'] = 'Data Film';
            $_SESSION['type'] = 'error';
        }
    } else {
        // ekstensi yang diijinkan
        $ekstensi_diijinkan = ['jpeg', 'png', 'jpg'];

        //formulir_lamaran
        $name_foto_film = explode('.', $foto_film['name']);
        $eks_foto_film = strtolower(end($name_foto_film));
        $cek_eks_foto_film = in_array($eks_foto_film, $ekstensi_diijinkan);
        $random_foto_film = random_name($foto_film['name']);

        $folder = "../assets/img/film/";

        if ($cek_eks_foto_film) {
            $sql = mysqli_query($koneksi, "UPDATE `film` SET `judul`='$judul',`durasi`='$durasi',`genre`='$genre',`kategori`='$kategori' ,`tanggal_tayang`='$tanggal_tayang',`direktori`='$random_foto_film' WHERE `id_film` = '$id'");

            //insert foto_film
            move_uploaded_file($foto_film["tmp_name"], $folder . $random_foto_film);

            $old_foto = $getdata['direktori'];
            unlink($folder . $old_foto);

            if ($sql) {
                $_SESSION['message'] = 'Data berhasil di ubah';
                $_SESSION['title'] = 'Data Film';
                $_SESSION['type'] = 'success';
            } else {
                $_SESSION['message'] = 'Data gagal di ubah';
                $_SESSION['title'] = 'Data Film';
                $_SESSION['type'] = 'error';
            }
        } else {
            $_SESSION['message'] = 'Ekstensi file tidak diijinkan';
            $_SESSION['title'] = 'Data Film';
            $_SESSION['type'] = 'error';
        }
    }

    echo "<script>window.location.href = '?page=film';</script>";
}
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <div class="card card-accent-success">
        <div class="card-header"><strong>Ubah Data Film</strong></div>
        <div class="card-body">
            <form action="#" method="post" data-toggle="validator" role="form" enctype="multipart/form-data">


                <div class="form-group has-feedback">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" value="<?= $getdata['judul'] ?>" name="judul" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="durasi">Durasi</label>
                    <input type="text" class="form-control" id="durasi" value="<?= $getdata['durasi'] ?>" name="durasi" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" value="<?= $getdata['kategori'] ?>" name="kategori" data-required-error="Data tidak boleh kosong" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="tanggal_tayang">Tanggal Tayang</label>
                    <input type="text" class="form-control" id="datepicker" name="tanggal_tayang" value="<?= date('d-m-Y', strtotime($getdata['tanggal_tayang'])) ?>" data-required-error="Data tidak boleh kosong" onkeypress="return false" required>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback">
                    <label for="genre">Genre</label>
                    <select name="genre" id="genre" class="form-control" data-required-error="Data tidak boleh kosong" required>
                        <option value="">-Pilih Genre-</option>
                        <option value="Action" <?= $getdata['genre'] == 'Action' ? 'selected' : '' ?>>Action</option>
                        <option value="Petualangan" <?= $getdata['genre'] == 'Petualangan' ? 'selected' : '' ?>>Petualangan</option>
                        <option value="Komedi" <?= $getdata['genre'] == 'Komedi' ? 'selected' : '' ?>>Komedi</option>
                        <option value="Drama" <?= $getdata['genre'] == 'Drama' ? 'selected' : '' ?>>Drama</option>
                        <option value="Horror" <?= $getdata['genre'] == 'Horror' ? 'selected' : '' ?>>Horror</option>
                        <option value="Romantis" <?= $getdata['genre'] == 'Romantis' ? 'selected' : '' ?>>Romantis</option>
                        <option value="Science Fiction" <?= $getdata['genre'] == 'Science Fiction' ? 'selected' : '' ?>>Science Fiction</option>
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <span class="help-block with-errors"></span>
                </div>

                <div class="form-group has-feedback ">
                    <label for="foto_film">Foto film</label>
                    <div class="custom-file">
                        <input type="file" id="foto_film" name="foto_film" class=" custom-file-input" onchange="validate(this);">
                        <label class="custom-file-label" for="foto_film">
                            <span class="d-inline-block text-truncate w-75">Abaikan jika tidak akan diubah<br>
                            </span>
                        </label>
                        <span class="help-block with-errors"></span>
                    </div>

                </div>

                <div class="form-group mx-auto">
                    <button type="button" id="ubahfilm" data-nama="<?= $getdata['judul'] ?>" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="<?= BASE_URL . 'admin/index.php?page=film' ?>" class="btn btn-warning"><i class="fas fa-reply"></i> Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    var _validFileExtensions = [".jpg", ".jpeg", ".png"];

    function validate(file) {
        if (file.type == "file") {
            var sFileName = file.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Maaf Hanya Boleh File yang Berekstensi : " + _validFileExtensions.join(", "));
                    file.value = "";
                    return false;
                }
            }
        }
        return true;
    }
</script>