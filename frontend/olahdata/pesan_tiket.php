<?php
// Include PHPMailer library files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../../function/vendor/phpmailer/phpmailer/src/Exception.php');
require_once('../../function/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../../function/vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');

// Load Composer's autoloader
require('../../function/vendor/autoload.php');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

// SMTP configuration
configsmtp($mail);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_dt_jadwal = htmlspecialchars(ucwords($_POST['id_jadwal']));
    $id_film = htmlspecialchars(ucwords($_POST['id_film']));
    
    $kursi = ($_POST['kursi']);
    $jumlah = ($_POST['jumlah']);
    $harga_tiket = 35000;

    
    $tanggal = date('Y-m-d H:i:s');

    $no_kursi = "";
    $count = 0;
    foreach ($kursi as $key => $value) {
        if($count == 0){
            $no_kursi .= $value;
        }else{
            $no_kursi .=  ', ' . $value;
        }
        $count++;
    }

    

    if(empty($_SESSION['login_customer'])){
        $nama = htmlspecialchars(ucwords($_POST['nama']));
        $telepon  = htmlspecialchars(ucwords($_POST['telepon']));
        $email = htmlspecialchars(ucwords($_POST['email']));

        $total_harga_tiket = $harga_tiket * $jumlah;

        //insert to customer
        $queryCek = mysqli_query($koneksi, "SELECT * FROM customer WHERE email = '$email'");

        if(mysqli_num_rows($queryCek) == 0 ){
            mysqli_query($koneksi, "INSERT INTO `customer`(`nama`, `alamat`, `no_telepon`, `status`) VALUES ('$nama', '$alamat', '$telepon', 'nonmember')");

            $queryCus = mysqli_query($koneksi, "SELECT * FROM customer ORDER BY id_customer DESC LIMIT 1");
            $getCus = mysqli_fetch_assoc($queryCus);

            $id_customer = $getCus['id_customer'];
        }else{
            $getCustomer = mysqli_fetch_assoc($queryCek);
            $id_customer = $getCustomer['id_customer'];
        }

        $sql = mysqli_query($koneksi, "INSERT INTO `tiket`(`id_customer`, `id_dt_jadwal`, `no_kursi`, `jumlah`, `harga_tiket`, `total_harga_tiket`, `tanggal`) VALUES ('$id_customer', '$id_dt_jadwal', '$no_kursi', '$jumlah', '$harga_tiket', '$total_harga_tiket', '$tanggal')");

        if ($sql) {
            $queryTiket = mysqli_query($koneksi, "SELECT * FROM tiket ORDER BY id_customer DESC LIMIT 1");
            $getTiket = mysqli_fetch_assoc($queryTiket);
            $id_tiket = $getTiket['id_tiket'];

            header("location: ../../index.php?page=cetak_tiket&id=". $id_tiket."&nama=".$nama."&telepon=". $telepon);


        } else {
            $_SESSION['message'] = 'Transaksi gagal dilakukan.';
            $_SESSION['title'] = 'Data Transaksi';
            $_SESSION['type'] = 'error';
            header("location: ../../index.php");
        }

        
    }else{
        $id_customer = $_SESSION['id_customer'];

        
        if($jumlah == 5){
            $total_harga_tiket = $harga_tiket * $jumlah;
            $diskon = $total_harga_tiket * 0.2;
            $final_total_harga = $total_harga_tiket - $diskon;
        }else{
            $final_total_harga = $harga_tiket * $jumlah;
        }

        $sql = mysqli_query($koneksi, "INSERT INTO `tiket`(`id_customer`, `id_dt_jadwal`, `no_kursi`, `jumlah`, `harga_tiket`, `total_harga_tiket`, `tanggal`) VALUES ('$id_customer', '$id_dt_jadwal', '$no_kursi', '$jumlah', '$harga_tiket', '$final_total_harga', '$tanggal')");

        if ($sql) {
            $_SESSION['message'] = 'Transaksi berhasil dilakukan, silahkan ke menu tiket untuk melihat tagihan pembayaran.';
            $_SESSION['title'] = 'Data Transaksi';
            $_SESSION['type'] = 'success';
        } else {
            $_SESSION['message'] = 'Transaksi gagal dilakukan.';
            $_SESSION['title'] = 'Data Transaksi';
            $_SESSION['type'] = 'error';
        }

        header("location: ../../index.php");
    }

    
}
