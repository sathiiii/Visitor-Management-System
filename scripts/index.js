function toggle_visibility(id) {
    document.getElementById(id).classList.toggle("show");
  }

window.onclick = function(event) {
    if (!event.target.matches(".dropbtn")) {
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