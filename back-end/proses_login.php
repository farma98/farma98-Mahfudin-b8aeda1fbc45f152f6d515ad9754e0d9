<?php
session_start();
include_once('koneksi.php');
$database = new database();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST['remember'])) {
        $remember = TRUE;
    } else {
        $remember = FALSE;
    }

    if ($database->login($username, $password, $remember)) {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('yyyy-mm-dd H:i:s');
        $_SESSION['waktu'] = $waktu;
        $usernameQ = $_SESSION['username'];

        echo "<script type='text/javascript'>
		alert('Selamat Datang $usernameQ');
		window.location='home.php';
		</script>";
    }
}

if (isset($_SESSION['is_login'])) {
    date_default_timezone_set('Asia/Jakarta');
    $waktu = date('yyyy-mm-dd H:i:s');
    $_SESSION['waktu'] = $waktu;
    $usernameQ = $_SESSION['username'];

    echo "<script type='text/javascript'>
	alert('Selamat Datang $usernameQ');
	window.location='home.php';
	</script>";
}

if (isset($_COOKIE['username'])) {
    $database->relogin($_COOKIE['username']);
    date_default_timezone_set('Asia/Jakarta');
    $waktu = date('yyyy-mm-dd H:i:s');
    $_SESSION['waktu'] = $waktu;
    $usernameQ = $_SESSION['username'];

    echo "<script type='text/javascript'>
	alert('Selamat Datang $usernameQ');
	window.location='home.php';
	</script>";
}
