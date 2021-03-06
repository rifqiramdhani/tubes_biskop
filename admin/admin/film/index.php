<?php
$query = mysqli_query($koneksi, "SELECT * FROM `film`");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <a href="<?= BASE_URL . 'admin/index.php?page=film&action=tambahdata' ?>" class="btn btn-success mt-3 mb-3">
        <i class="fas fa-plus"></i> Tambah
    </a>

    <!-- show sweet alert -->
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>" data-type="<?= $_SESSION['type'] ?>"></div>
    <?php
        unset($_SESSION['message']);
        unset($_SESSION['title']);
        unset($_SESSION['type']);
    endif;
    ?>

    <div class="card card-accent-success">
        <div class="card-header"><strong>Data Film</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datafilm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Durasi</th>
                            <th>Genre</th>
                            <th>Karegori</th>
                            <th>Tanggal Tayang</th>
                            <th>Foto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_film'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['judul'] ?></td>
                                <td><?= $getdata['durasi'] ?></td>
                                <td><?= $getdata['genre'] ?></td>
                                <td><?= $getdata['kategori'] ?></td>
                                <td><?= date('d-m-Y', strtotime($getdata['tanggal_tayang'])) ?></td>
                                <td>
                                    <a href="<?= BASE_URL . ('assets/img/film/'. $getdata['direktori']) ?>" data-toggle="lightbox" data-max-width="600">
                                        <img src="<?= BASE_URL . ('assets/img/film/'. $getdata['direktori']) ?>" class="img-fluid" width="100px">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= BASE_URL . 'admin/index.php?page=film&action=editdata&id=' . $getdata['id_film'] ?>" class="btn btn-sm btn-primary mt-1"><i class="fas fa-edit"></i></a>
                                    <button type="button" data-id="<?= $getdata['id_film'] ?>" data-nama="<?= $getdata['judul'] ?>" class="btn btn-sm btn-danger remove mt-1"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>