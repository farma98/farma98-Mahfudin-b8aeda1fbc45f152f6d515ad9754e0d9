<?php
class database
{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "db_login";
	var $koneksi;

	function __construct()
	{
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
	}


	function register($username, $password, $nama)
	{
		$insert = mysqli_query($this->koneksi, "insert into tbl_user values ('','$username','$password','$nama', '')");
		return $insert;
	}

	function login($username, $password, $remember)
	{
		$query = mysqli_query($this->koneksi, "select * from tbl_user where username='$username'");
		$cek = mysqli_num_rows($query);

		if ($cek > 0) {
			$data_user = $query->fetch_array();
			if (password_verify($password, $data_user['password'])) {
				if ($remember) {
					setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
					setcookie('nama', $data_user['nama'], time() + (60 * 60 * 24 * 5), '/');
				}

				$_SESSION['username'] = $username;
				$_SESSION['nama'] = $data_user['nama'];
				$_SESSION['is_login'] = TRUE;
				return TRUE;
			} else {
				echo "<script>alert('Password Salah!');history.go(-1);</script>";
				exit;
			}
		} else {
			echo "<script>alert('Username Salah!');history.go(-1);</script>";
			exit;
		}
	}

	function update_data($waktu, $username)
	{
		$waktu = date('d-m-Y H:i:s');
		mysqli_query($this->koneksi, "update tbl_user set loginTime='$waktu' where username ='$username'");
	}

	function relogin($username)
	{
		$query = mysqli_query($this->koneksi, "select * from tbl_user where username='$username'");
		$data_user = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data_user['nama'];
		$_SESSION['is_login'] = TRUE;
	}

	function tampil_data()
	{
		$data = mysqli_query($this->koneksi, "select * from tbl_user");
		while ($row = mysqli_fetch_array($data)) {
			$hasil[] = $row;
		}
		return $hasil;
	}
}