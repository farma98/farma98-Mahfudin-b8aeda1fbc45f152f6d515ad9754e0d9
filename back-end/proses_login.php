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
        $usernameQ = $_SESSION['nama'];

        echo "<script type='text/javascript'>
		alert('Selamat Datang $usernameQ');
		window.location='home.php';
		</script>";
    }
}

if (isset($_SESSION['is_login'])) {
    $usernameQ = $_SESSION['nama'];

    echo "<script type='text/javascript'>
	alert('Selamat Datang $usernameQ');
	window.location='home.php';
	</script>";
}

if (isset($_COOKIE['username'])) {
    $database->relogin($_COOKIE['username']);
    $usernameQ = $_SESSION['nama'];

    echo "<script type='text/javascript'>
	alert('Selamat Datang $usernameQ');
	window.location='home.php';
	</script>";
}
