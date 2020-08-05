function validate(event) {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var login_btn = document.getElementById("login-btn");

    if (username.length > 0 && password.length > 4 && event.keyCode == 13) {
        submit();
    }
    if (username.length > 0 && password.length > 4) {
        login_btn.style.backgroundColor = "#2CD889";
        login_btn.style.pointerEvents = "all";
    }
    else {
        login_btn.style.backgroundColor = "#9ca7a2";
        login_btn.style.pointerEvents = "none";
    }
    if (password.length <= 4) {
        document.head.appendChild(document.createElement("style")).innerHTML = ".password label::after {border-color: red;}";
        document.removeChild("style");
    }
    else {
        document.head.appendChild(document.createElement("style")).innerHTML = ".password label::after {border-color: #2CD889;}";
        document.removeChild("style");
    }
}

function hideWarnings() {
    var warnings = document.getElementById("warnings");
    if (warnings.style.display != "none")
        warnings.style.display = "none";
}

function submit() {
    if (!getCookie("attempts"))
        document.cookie = "attempts=0";
    var attempts = Number(getCookie("attempts")) + 1;
    document.cookie = "attempts=" + attempts;
    document.forms[0].submit();
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    else return "";
}

function init() {
    if (getCookie("uid") && getCookie("upw")) {
        document.getElementById("username").value = getCookie("uid");
        document.getElementById("password").value = getCookie("upw");
        document.getElementById("remember").checked = true;
        var login_btn = document.getElementById("login-btn");
        login_btn.style.backgroundColor = "#2CD889";
        login_btn.style.pointerEvents = "all";
    }
    if (!getCookie("attempts"))
        document.cookie = "attempts=0";
    var attempts = Number(getCookie("attempts"));
    if (attempts >= 5) {
        document.getElementById("redirect").style.display = 'block';
    }
    var err = getCookie("error");
    if (err != "") {
        var username = getCookie("username");
        document.getElementById("username").value = username;
        document.getElementById("warnings").style.display = 'block';
        document.cookie = "error=;";
    }
}

function check(checkbox) {
    if (checkbox.checked) {
        document.cookie = "remcheck=1";
    }
    else {
        document.cookie = "remcheck=";
    }
}