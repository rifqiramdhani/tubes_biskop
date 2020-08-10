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

    var_dump($_POST);
    $id_paket_makanan = htmlspecialchars(ucwords($_POST['id_paket_makanan']));
    $nama_paket_makanan = htmlspecialchars(ucwords($_POST['nama_paket_makanan']));
    $harga = htmlspecialchars(ucwords($_POST['harga']));
    $qty = htmlspecialchars(ucwords($_POST['qty']));
    $pembayaran = htmlspecialchars(ucwords($_POST['pembayaran']));
    $nama = htmlspecialchars(ucwords($_POST['nama']));
    $email = htmlspecialchars(ucwords($_POST['email']));
    $tanggal = date('Y-m-d H:i:s');

    if(isset($_SESSION['login_customer'])){
        $total_harga = $harga * $qty * 0.15;
    }else{
        $total_harga = $harga * $qty;
    }

    $sql = mysqli_query($koneksi, "INSERT INTO `struk`(`id_paket_makanan`, `nama`, `email`, `metode_pembayaran`, `total_harga`, `qty`, `tanggal`) VALUES ('$id_paket_makanan', '$nama', '$email', '$pembayaran', '$total_harga', '$qty', '$tanggal')");

    header("location: ../../index.php");

    if ($sql) {
        $queryTiket = mysqli_query($koneksi, "SELECT * FROM struk ORDER BY id_struk DESC LIMIT 1");
        $getTiket = mysqli_fetch_assoc($queryTiket);

        $mail->addAddress($email);
        $mail->Subject = 'Struk Makanan Bioskop Riyoruki';
        $mailContent = '
            <h2>Serahkan bukti tiket ini kekasir.</h2>
            <p>ID Struk    : ' . $getTiket['id_struk'] . '</p>
            <p>Nama Paket  : ' . $nama_paket_makanan . '</p>
            <p>Harga Paket : ' . rupiah($harga) . '</p>
            <p>Total Bayar : ' . rupiah($total_harga) . '</p>
            ';
        $mail->Body = $mailContent;

        if (!$mail->send()) {
            $mail->ErrorInfo;
            die;
        } else {
            $_SESSION['message'] = 'Pemesanan makanan berhasil dilakukan, silahkan buka email anda untuk melihat struk.';
            $_SESSION['title'] = 'Data Pemesanan';
            $_SESSION['type'] = 'success';
        }
    } else {
        $_SESSION['message'] = 'Pemesanan gagal dilakukan.';
        $_SESSION['title'] = 'Data Pemesanan';
        $_SESSION['type'] = 'error';
    }
}
