<?php

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM `studio` WHERE id_studio = '$id'");
    // mysqli_query($koneksi, "UPDATE `karyawan` SET `status_karyawan`= 0 WHERE id_karyawan = '$id'");
}

?>