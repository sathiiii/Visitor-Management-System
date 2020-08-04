var attempts = 0;

function validate() {
    if (attempts >= 3) {
        document.getElementById("redirect").style.display = "block";
    }

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var login_btn = document.getElementById("login-btn");

    if (username.length > 0 && password.length > 4) {
        login_btn.style.backgroundColor = "#2CD889";
        login_btn.style.pointerEvents = "all";
    }
    else {
        login_btn.style.backgroundColor = "#9ca7a2";
        login_btn.style.pointerEvents = "none";
    }
}

function hideWarnings() {
    var warnings = document.getElementById("warnings");
    if (warnings.style.display != "none")
        warnings.style.display = "none";
}

function submit() {
    attempts++;
    this.forms[0].submit();
}