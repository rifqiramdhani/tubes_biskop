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

    $id_paket_makanan = htmlspecialchars(ucwords($_POST['id_paket_makanan']));
    $nama_paket_makanan = htmlspecialchars(ucwords($_POST['nama_paket_makanan']));
    $harga = $_POST['harga'];
    $qty = $_POST['qty'];
    $nama = htmlspecialchars(ucwords($_POST['nama']));
    $tanggal = date('Y-m-d H:i:s');

    if (isset($_SESSION['login_customer'])) {
        $diskon = $harga * $qty * 0.15;
        $total_harga = $harga * $qty - $diskon; 
        $id_customer = $_SESSION['id_customer'];

        $sql = mysqli_query($koneksi, "INSERT INTO `struk`(`id_customer`,`id_paket_makanan`, `nama`, `total_harga`, `qty`, `tanggal`) VALUES ('$id_customer','$id_paket_makanan', '$nama', '$total_harga', '$qty', '$tanggal')");
    } else {
        $total_harga = $harga * $qty;
        $sql = mysqli_query($koneksi, "INSERT INTO `struk`(`id_paket_makanan`, `nama`, `total_harga`, `qty`, `tanggal`) VALUES ('$id_paket_makanan', '$nama', '$total_harga', '$qty', '$tanggal')");
    }


    if ($sql) {
        $queryMakanan = mysqli_query($koneksi, "SELECT * FROM paket_makanan WHERE id_paket_makanan = '$id_paket_makanan'");
        $getMakanan = mysqli_fetch_assoc($queryMakanan);
        $stok = $getMakanan['stok'] - $qty;

        mysqli_query($koneksi, "UPDATE `paket_makanan` SET `stok`='$stok' WHERE `id_paket_makanan` = '$id_paket_makanan'");
        
        if (isset($_SESSION['login_customer'])) {
            
            $_SESSION['message'] = 'Pemesanan Makan berhasil dilakukan, silahkan ke menu tiket untuk melihat tagihan pembayaran.';
            $_SESSION['title'] = 'Data Pemesanan Makan';
            $_SESSION['type'] = 'success';

            header("location: ../../index.php");

        }else{

            $queryTiket = mysqli_query($koneksi, "SELECT * FROM struk ORDER BY id_struk DESC LIMIT 1");
            $getTiket = mysqli_fetch_assoc($queryTiket);
            $id_struk = $getTiket['id_struk'];

            header("location: ../../index.php?page=cetak_struk&id=" . $id_struk);
        }
        
        

    } else {
        $_SESSION['message'] = 'Pemesanan gagal dilakukan.';
        $_SESSION['title'] = 'Data Pemesanan';
        $_SESSION['type'] = 'error';
        
        header("location: ../../index.php");
    }
}
