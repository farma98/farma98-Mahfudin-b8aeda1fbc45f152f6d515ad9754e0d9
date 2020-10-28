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
					setcookie('username', $username, time() + (60 * 60), '/');
					setcookie('nama', $data_user['nama'], time() + (60 * 60), '/');
				}
				$_SESSION['username'] = $username;
				$_SESSION['nama'] = $data_user['nama'];
				$_SESSION['is_login'] = TRUE;

				// update waktu saat login
				$waktu = date('yyyy-mm-dd H:i:s');
				$_SESSION['waktu'] = $waktu;

				$insert = mysqli_query($this->koneksi, "UPDATE tbl_user SET loginTime = NOW() WHERE username ='$username'");
				return $insert;
			} else {
				echo "<script>alert('Password Salah!');history.go(-1);</script>";
				exit;
			}
		} else {
			echo "<script>alert('Username Salah!');history.go(-1);</script>";
			exit;
		}
	}

	function relogin($username)
	{
		$query = mysqli_query($this->koneksi, "select * from tbl_user where username='$username'");
		$data_user = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data_user['nama'];
		$_SESSION['is_login'] = TRUE;
	}

	function search_data()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start

		$data = mysqli_query($this->koneksi, "select username from tbl_user");
		$datacount = mysqli_num_rows($data); // Hitung data yg ada pada query $sql
		$query = "SELECT * FROM tbl_user WHERE (username LIKE '%" . $search . "%' OR nama LIKE '%" . $search . "%')";

		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
		$order = " ORDER BY " . $order_field . " " . $order_ascdesc;

		$sql_data = mysqli_query($this->koneksi, $query . $order . " LIMIT " . $limit . " OFFSET " . $start); // Query untuk data yang akan di tampilkan
		$sql_filter = mysqli_query($this->koneksi, $query); // Query untuk count jumlah data sesuai dengan filter pada textbox pencarian

		$sql_filter_count = mysqli_num_rows($sql_filter); // Hitung data yg ada pada query $sql_filter
		$data = mysqli_fetch_all($sql_data, MYSQLI_ASSOC); // Untuk mengambil data hasil query menjadi array
		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $datacount,
			'recordsFiltered' => $sql_filter_count,
			'data' => $data
		);
		header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}

	function update_data()
	{
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('d-m-Y H:i:s');
		$data = mysqli_query($this->koneksi, "update tbl_user set loginTime='$waktu'");
		return $data;
	}

	// function tampil_data()
	// {
	// 	$data = mysqli_query($this->koneksi, "select * from tbl_user");
	// 	while ($row = mysqli_fetch_array($data)) {
	// 		$hasil[] = $row;
	// 	}
	// 	return $hasil;
	// }
}
