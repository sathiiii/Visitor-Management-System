function triggerClick(e) {
document.querySelector('#profileImage').click();
}
function displayImage(e) {
if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
}
}
function passFunc(y) {
var x = document.getElementById(y);
if (x.type === "password") {
    x.type = "text";
} else {
    x.type = "password";
    }
}
var password = document.getElementById("password"),
confirm_password = document.getElementById("confirm_password");

function validatePassword() {
if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
} else {
    confirm_password.setCustomValidity('');
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
