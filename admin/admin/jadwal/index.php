<?php
$query = mysqli_query($koneksi, "SELECT * FROM `jadwal` ORDER BY jam_tayang ASC");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-6">
    <a href="<?= BASE_URL . 'admin/index.php?page=jadwal&action=tambahdata' ?>" class="btn btn-success mt-3 mb-3">
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
        <div class="card-header"><strong>Data Jadwal</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datajadwal">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jam Tayang</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_jadwal'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= date('H:i', strtotime($getdata['jam_tayang'])) ?></td>
                                <td>
                                    <a href="<?= BASE_URL . 'admin/index.php?page=jadwal&action=editdata&id=' . $getdata['id_jadwal'] ?>" class="btn btn-sm btn-primary mt-1"><i class="fas fa-edit"></i></a>
                                    <button type="button" data-id="<?= $getdata['id_jadwal'] ?>" data-nama="Jadwal" class="btn btn-sm btn-danger remove mt-1"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>