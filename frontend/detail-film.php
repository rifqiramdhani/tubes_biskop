<?php require_once('frontend/template/header.php') ?>

<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM film WHERE id_film = '$id'");
$getdata = mysqli_fetch_assoc($query);
?>

<body>
    <div class="content">
        <?php require_once('frontend/template/navbar.php') ?>

        <div class="main-content">
            <div class="min-vh-100">
                <div class="top-header">
                    <div class="logo"><a href="index.php"><img src="frontend/assets/img/logo.png"></a></div>
                </div>
                <div class="container" style="margin-top: 80px;">
                    <div class="row">
                        <div class="col">
                            <h2 class="text-center mb-5">Detail Film</h2>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg-8 pl-lg-0">
                            <div class="card border-primary">
                                <form action="">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left border-bottom-0">Judul</td>
                                                        <td class="text-right border-bottom-0">
                                                            <strong><?= $getdata['judul'] ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left border-bottom-0">Durasi</td>
                                                        <td class="text-right border-bottom-0">
                                                            <strong><?= $getdata['durasi'] ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left border-bottom-0">Genre</td>
                                                        <td class="text-right border-bottom-0">
                                                            <strong><?= $getdata['genre'] ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left border-bottom-0">Kategori</td>
                                                        <td class="text-right border-bottom-0">
                                                            <strong><?= $getdata['kategori'] ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left border-bottom-0">Tanggal Tayang</td>
                                                        <td class="text-right border-bottom-0">
                                                            <strong><?= tgl_indo($getdata['tanggal_tayang']) ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left border-bottom-0">Harga Tiket</td>
                                                        <td class="text-right border-bottom-0">
                                                            <strong><?= rupiah(35000) ?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    <div class="card-footer"></div>

                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card border-primary car-list mt-0">
                                <div class="card-header">
                                 
                                </div>
                                <div class="card-body text-center"><img class="img-thumbnail" src="<?= BASE_URL . 'assets/img/film/' . $getdata['direktori'] ?>" width="200px">
                                    <p><?= $getdata['judul'] ?></p>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <a href="?page=pesan&id=<?= $id ?>" class="btn btn-primary btn-block p-3" style="font-size: 15px; font-weight: 500">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require_once('frontend/template/footer.php') ?>