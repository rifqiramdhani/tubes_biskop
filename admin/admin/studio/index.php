<?php
$query = mysqli_query($koneksi, "SELECT * FROM `studio` ORDER BY nama_studio ASC");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <a href="<?= BASE_URL . 'admin/index.php?page=studio&action=tambahdata' ?>" class="btn btn-success mt-3 mb-3">
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
        <div class="card-header"><strong>Data Studio</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datastudio">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Studio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_studio'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['nama_studio'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL . 'admin/index.php?page=studio&action=editdata&id=' . $getdata['id_studio'] ?>" class="btn btn-sm btn-primary mt-1"><i class="fas fa-edit"></i></a>
                                    <button type="button" data-id="<?= $getdata['id_studio'] ?>" data-nama="<?= $getdata['nama_studio'] ?>" class="btn btn-sm btn-danger remove mt-1"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>