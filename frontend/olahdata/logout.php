<?php

require_once('../../function/helper.php');

unset($_SESSION['login_customer']);
unset($_SESSION['email_customer']);
unset($_SESSION['id_customer']);

$_SESSION['message'] = 'Selamat anda berhasil logout';
$_SESSION['title'] = 'Logout';
$_SESSION['type'] = 'success';

redirect('index.php');

?>