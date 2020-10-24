var username = document.forms['vform']['username'];
var nama = document.forms['vform']['nama'];
var password = document.forms['vform']['password'];
var passwordQ = document.forms['vform']['passwordQ'];

var username_error = document.getElementById('username_error');
var nama_error = document.getElementById('nama_error');
var password_error = document.getElementById('password_error');
var password_errorQ = document.getElementById('password_errorQ');

username.addEventListener('blur', usernameVerify, true);
nama.addEventListener('blur', namaVerify, true);
password.addEventListener('blur', passwordVerify, true);
passwordQ.addEventListener('blur', passwordVerifyQ, true);

function Validate() {
    // validate username
    if (username.value == "") {
        username.style.border = "1px solid red";
        document.getElementById('username_div').style.color = "red";
        username_error.textContent = "Username is required";
        username.focus();
        return false;
    }
    // validate name
    if (nama.value == "") {
        nama.style.border = "1px solid red";
        document.getElementById('nama_div').style.color = "red";
        nama_error.textContent = "Nama is required";
        nama.focus();
        return false;
    }
    // validate password
    if (password.value == "") {
        password.style.border = "1px solid red";
        document.getElementById('password_div').style.color = "red";
        password_error.textContent = "Password Is Required";
        password.focus();
        return false;
    } else if (password.value != passwordQ.value) {
        password.style.border = "1px solid red";
        document.getElementById('password_div').style.color = "red";
        password_error.textContent = "Do not Match Password";
        password.focus();
        return false;
    }

    // validate password
    if (passwordQ.value == "") {
        passwordQ.style.border = "1px solid red";
        document.getElementById('password_divQ').style.color = "red";
        password_errorQ.textContent = "Re Type Password Is Required";
        passwordQ.focus();
        return false;
    } else if (password.value != passwordQ.value) {
        passwordQ.style.border = "1px solid red";
        document.getElementById('password_divQ').style.color = "red";
        password_errorQ.textContent = "Do not Match Password";
        password.focus();
        return false;
    }

}


function usernameVerify() {
    if (username.value != "") {
        username.style.border = "1px solid #5e6e66";
        document.getElementById('username_div').style.color = "#5e6e66";
        username_error.innerHTML = "";
        return true;
    }
}

function namaVerify() {
    if (nama.value != "") {
        nama.style.border = "1px solid #5e6e66";
        document.getElementById('nama_div').style.color = "#5e6e66";
        nama_error.innerHTML = "";
        return true;
    }
}

function passwordVerify() {
    if (password.value != "") {
        password.style.border = "1px solid #5e6e66";
        document.getElementById('password_div').style.color = "#5e6e66";
        password_error.innerHTML = "";
        return true;
    }
}

function passwordVerifyQ() {
    if (passwordQ.value != "") {
        passwordQ.style.border = "1px solid #5e6e66";
        document.getElementById('password_divQ').style.color = "#5e6e66";
        password_errorQ.innerHTML = "";
        return true;
    }
}