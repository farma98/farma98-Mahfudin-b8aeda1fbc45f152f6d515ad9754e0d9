<?php
session_start();
session_unset();
session_destroy();
setcookie('username', '', 0, '/');
setcookie('nama', '', 0, '/');
echo "<script type='text/javascript'>alert('Anda Telah Logout!');
window.location='../front-end/index.php';
</script>";
