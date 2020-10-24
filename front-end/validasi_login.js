var username = document.forms['vform']['username'];
var password = document.forms['vform']['password'];

var username_error = document.getElementById('username_error');
var password_error = document.getElementById('password_error');

username.addEventListener('blur', usernameVerify, true);
password.addEventListener('blur', passwordVerify, true);

function Validate() {
    // validate username
    if (username.value == "") {
        username.style.border = "1px solid red";
        document.getElementById('username_div').style.color = "red";
        username_error.textContent = "Username is required";
        username.focus();
        return false;
    }
    // validate username
    if (password.value == "") {
        password.style.border = "1px solid red";
        document.getElementById('password_div').style.color = "red";
        password_error.textContent = "Password Is Required";
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

function passwordVerify() {
    if (password.value != "") {
        password.style.border = "1px solid #5e6e66";
        document.getElementById('password_div').style.color = "#5e6e66";
        password_error.innerHTML = "";
        return true;
    }
}