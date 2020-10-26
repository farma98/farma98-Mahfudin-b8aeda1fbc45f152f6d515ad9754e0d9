<?php
session_start();
include('koneksi.php');
$db = new database();
$data = $db->search_data();
