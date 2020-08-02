function toggle_visibility(id) {
    document.getElementById(id).classList.toggle("show");
  }

window.onclick = function(event) {
    if (!event.target.matches(".dropbtn")) {
        var dropdowns = document.getElementsByClassName("dropdown");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            console.log(i);
            if (openDropdown.classList.contains("show"))
                openDropdown.classList.remove("show");
        }
    }
}