<?php
include('back-end/proses_register.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="front-end/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" onsubmit="return Validate()" name="vform">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group" id="username_div">
                                                    <label class="small mb-1" for="username">Username</label>
                                                    <input class="form-control py-4" name="username" id="username" type="text" placeholder="Username" />
                                                    <div id="username_error"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" id="nama_div">
                                                    <label class="small mb-1" for="nama">Name</label>
                                                    <input class="form-control py-4" name="nama" id="nama" type="text" placeholder="Nama" />
                                                    <div id="nama_error"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" id="password_div">
                                                    <label class="small mb-1" for="password">Password</label>
                                                    <input class="form-control py-4" name="password" id="password" type="password" placeholder="Password" />
                                                    <div id="password_error"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" id="password_divQ">
                                                    <label class="small mb-1" for="passwordQ">Password</label>
                                                    <input class="form-control py-4" name="passwordQ" id="passwordQ" type="password" placeholder="Password" />
                                                    <div id="password_errorQ"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0">
                                            <button class="btn btn-primary btn-block" type="submit" name="register">
                                                Register
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="front-end/index.php">Sudah Punya Account? Login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="front-end/scripts.js"></script>
    <script src="front-end/validasi_register.js"></script>
</body>

</html>