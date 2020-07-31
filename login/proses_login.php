<?php
require('../function/koneksi.php');
require('../function/helper.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $querycek = mysqli_query($koneksi, "SELECT * FROM `admin` WHERE email = '$email'");
        $getcek = mysqli_fetch_assoc($querycek);

        if(mysqli_num_rows($querycek) > 0){

            if(password_verify($password, $getcek['password'])){
                $data = [
                    'login' => true,
                    'email' => $email,
                    'level' => $getcek['level'],
                    'id_admin' => $getcek['id_admin'],
                    'nama' => $getcek['nama']
                ];

                //fungsi memasukkan data kedalam session
                session_userdata($data);
                redirect('admin');


            }else{
                $_SESSION['message'] = 'Maaf password yang anda masukan salah.';
                $_SESSION['title'] = 'Login';
                $_SESSION['type'] = 'error';
                header('location: index.php');
            }
        
        }else{
            $_SESSION['message'] = 'Maaf email yang anda masukan belum terdaftar..';
            $_SESSION['title'] = 'Login';
            $_SESSION['type'] = 'error';
            header('location: index.php');
        }
    }

}else{
    header('location: index.php');
}

?>