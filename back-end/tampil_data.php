<?php
session_start();
include('koneksi.php');
$db = new database();
$data = $db->tampil_data();
