<?php
include_once('koneksi.php');
$database = new database();
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nama = $_POST['nama'];
    if ($database->register($username, $password, $nama)) {
        echo "<script type='text/javascript'>alert('Berhasil Register, Silahkan Login!');
	    window.location='../front-end/index.html';
	    </script>";
    }
}
