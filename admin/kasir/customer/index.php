<?php
$query = mysqli_query($koneksi, "SELECT customer.*, admin.nama as nama_admin FROM `customer` JOIN admin USING(id_admin)");
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-12">
    <a href="<?= BASE_URL . 'admin/index.php?page=customer&action=tambahdata' ?>" class="btn btn-success mt-3 mb-3">
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
        <div class="card-header"><strong>Data Customer</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="datacustomer">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Nama Admin</th>
                            <!-- <th></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($getdata = mysqli_fetch_assoc($query)) : ?>
                            <tr id="<?= $getdata['id_customer'] ?>">
                                <td><?= $i++ ?></td>
                                <td><?= $getdata['nama'] ?></td>
                                <td><?= $getdata['email'] ?></td>
                                <td><?= $getdata['jenis_kelamin'] ?></td>
                                <td><?= $getdata['no_telepon'] ?></td>
                                <td><?= $getdata['tempat_tanggal_lahir'] ?></td>
                                <td><?= $getdata['alamat'] ?></td>
                                <td><?= $getdata['nama_admin'] ?></td>
                                <!-- <td>
                                    <a href="<?= BASE_URL . 'admin/index.php?page=karyawan&action=editdata&id=' . $getdata['id_customer'] ?>" class="btn btn-sm btn-primary mt-1"><i class="fas fa-edit"></i></a>
                                    <button type="button" data-id="<?= $getdata['id_customer'] ?>" data-nama="<?= $getdata['nama'] ?>" class="btn btn-sm btn-danger remove mt-1"><i class="fas fa-trash"></i></button>
                                </td> -->
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>