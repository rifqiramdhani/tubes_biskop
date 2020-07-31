<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "tubes_bioskop";
    $koneksi = mysqli_connect($server, $username, $password, $database) or die("Koneksi ke database gagal");
    mysqli_set_charset($koneksi, 'utf-8');
?>