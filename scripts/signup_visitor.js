function scrollUp() {
    if (document.getElementById("upload-profile").files.length == 0) {
        document.getElementById("warning-label").innerText = "Please upload a profile picture!";
        document.querySelector(".upload-profile-image").classList.add("upload-warning");
        setTimeout(function() {
            document.querySelector(".upload-profile-image").classList.remove("upload-warning");
        }, 600);
        return false;
    }
    document.getElementById("signup-info").style.transform = "translateY(-100vh)";
}

function scrollDown() {
    document.getElementById("signup-info").style.transform = "translateY(0)";
}

function submit() {
    document.forms[0].submit();
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function handle(available) {
    if (available) {
        document.body.appendChild(document.createElement("style")).innerHTML = ".email label::after {border-color: red;}";
        document.getElementById("continue").style.pointerEvents = "none";
        document.getElementById("continue").style.backgroundColor = "#9ca7a2";
    }
}

function checkEmailAvailability() {
    jQuery.ajax({
        url: "check_availability.php",
        data: "email=" + $("#email").val(),
        type: "POST",
        success: function(data) {
            data = jQuery.parseJSON(data);
            $("#email-availability").html(data[0]);
            handle(data[1]);
        },
        error: function () {}
    });
}

function validate(textbox) {
    var invalidNIC = document.getElementById("nic").value.length < 9;
    var invalidPhone = document.getElementById("phone").value.length < 9;
    if (textbox.id == "email")
        checkEmailAvailability();
    if (textbox.value == "" || (textbox.id == "nic" && invalidNIC) || (textbox.id == "phone" && invalidPhone) || (textbox.id == "email" && !validateEmail(textbox.value))) {
        document.body.appendChild(document.createElement("style")).innerHTML = "." + textbox.id + " label::after {border-color: red;}";
    }
    else {
        document.body.appendChild(document.createElement("style")).innerHTML = "." + textbox.id + " label::after {border-color: #2CA9D8;}";
    }
    var textboxes = document.querySelectorAll(".info .textbox input");
    var values = [];
    textboxes.forEach(v => values.push(v.value));
    document.getElementById("continue").style.pointerEvents = "all";
    document.getElementById("continue").style.backgroundColor = "#2CA9D8";
    if (values.includes("") || invalidNIC || invalidPhone || !validateEmail(document.getElementById("email").value)) {
        document.getElementById("continue").style.pointerEvents = "none";
        document.getElementById("continue").style.backgroundColor = "#9ca7a2";
    }
}

function displayImage(e) {
    if (e.files[0]) {
        document.getElementById("warning-label").innerHTML = "";
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("profile-picture").setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}

function validateAll() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var password_conf = document.getElementById("password-confirm");
    var signup_btn = document.getElementById("signup-btn");
    if (username.value.length > 4 && password.value.length > 0 && (password.value == password_conf.value)) {
        signup_btn.style.pointerEvents = "all";
        signup_btn.style.backgroundColor = "#2CA9D8";
    }
    else {
        signup_btn.style.pointerEvents = "none";
        signup_btn.style.backgroundColor = "#9ca7a2";
    }
}

function handleUsername(available) {
    if (available == "0") {
        document.body.appendChild(document.createElement("style")).innerHTML = "." + username.id + " label::after {border-color: red;}";
        signup_btn.style.pointerEvents = "none";
        signup_btn.style.backgroundColor = "#9ca7a2";
    }
}

function check(username) {
    validateAll();
    if (username.value.length > 4) {
        document.getElementById("username-availability").innerText = "";
        document.body.appendChild(document.createElement("style")).innerHTML = "." + username.id + " label::after {border-color: #2CA9D8;}";
        jQuery.ajax({
            url: "check_availability.php",
            data:'username=' + $("#username").val(),
            type: "POST",
            success: function(data) {
                data = jQuery.parseJSON(data);
                $("#username-availability").html(data[0]);
                handleUsername(data[1]);
            },
            error: function () {}
        });
        return true;
    }
    document.body.appendChild(document.createElement("style")).innerHTML = "." + username.id + " label::after {border-color: red;}";
    document.getElementById("username-availability").innerText = "Username must contain at least 5 characters";
}

function validatePassword(password) {
    validateAll();
    if (password.value.length > 0) {
        document.body.appendChild(document.createElement("style")).innerHTML = "." + password.id + " label::after {border-color: #2CA9D8;}";
    }
    else {
        document.body.appendChild(document.createElement("style")).innerHTML = "." + password.id + " label::after {border-color: red;}";
    }
}

function confirmPassword(password) {
    validateAll();
    if (password.value != document.getElementById("password").value) {
        document.body.appendChild(document.createElement("style")).innerHTML = "." + password.id + " label::after {border-color: red;}";
    }
    else {
        document.body.appendChild(document.createElement("style")).innerHTML = "." + password.id + " label::after {border-color: #2CA9D8;}";
    }
}