<?php
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $email = $_POST['email'];
    echo $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM `customer` WHERE email = '$email'");
    $getdata = mysqli_fetch_assoc($query);

    
    if (mysqli_num_rows($query) > 0) {
        
        if (password_verify($password, $getdata['password'])) {
            $data = [
                'login_customer' => true,
                'email_customer' => $email,
                'id_customer' => $getdata['id_customer']
            ];

            //fungsi memasukkan data kedalam session
            session_userdata($data);

            $_SESSION['message'] = 'Selamat datang kembali '. $getdata['nama'];
            $_SESSION['title'] = 'Login';
            $_SESSION['type'] = 'success';
            redirect('index.php');
        } else {
            $_SESSION['message'] = 'Maaf password salah!';
            $_SESSION['title'] = 'Login';
            $_SESSION['type'] = 'error';
            redirect('index.php');
        }
    } else {
        $_SESSION['message'] = 'Maaf email belum terdaftar!';
        $_SESSION['title'] = 'Login';
        $_SESSION['type'] = 'error';
        redirect('index.php');
    }
}
