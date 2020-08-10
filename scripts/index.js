function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    else return "";
}

function toggle_visibility(id) {
    document.getElementById(id).classList.toggle("show");
}

window.onload = function() {
    var checkstatus = document.getElementById("checkstatus");
    if (getCookie("status") == "1")
        checkstatus.checked = true;
    else
        checkstatus.checked = false;
    updateStatus(checkstatus);
}

window.onclick = function(event) {
    console.log(event.target);
    if (!event.target.matches(".dropbtn") && event.target.id != "stat" && !event.target.matches('.slider') && event.target.id != 'checkstatus') {
        var dropdowns = document.getElementsByClassName("dropdown");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show"))
                openDropdown.classList.remove("show");
        }
    }
}

window.onscroll = function(event) {  
    var scroll = document.documentElement.scrollTop;
    var header = document.getElementById("header");
    if (scroll > 0) {
        header.classList.add("active");
    }
    else {
        header.classList.remove("active");
    }
}

window.onresize = function(event) {
    var dropdowns = document.getElementsByClassName("dropdown");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains("show"))
            openDropdown.classList.remove("show");
    }
}

function updateStatus(checkbox) {
    if (checkbox.checked) {
        document.cookie = "status=1";
        document.getElementById("status").innerText = "active";
        document.getElementById("status").style.color = "#2CD889";
    }
    else {
        document.cookie = "status=0";
        document.getElementById("status").innerText = "inactive";
        document.getElementById("status").style.color = "orange";
    }
}

function showPopup() {
    document.querySelector('.overlay').style.display = 'block';
    document.querySelector('.add-visitor').style.display = 'block';
}

function hidePopup() {
    document.querySelector('.overlay').style.display = 'none';
    document.querySelector('.add-visitor').style.display = 'none';
}