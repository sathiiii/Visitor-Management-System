var update_status = window.updateStatus;

window.updateStatus = function(checkbox) {
    update_status(checkbox);
    var statusLabel = document.getElementById('status-lbl');
    var statusLed = document.querySelector('.status-led');
    if (checkbox.checked) {
        statusLabel.innerText = 'ACTIVE';
        statusLabel.style.color = '#2CD889';
        statusLed.style.backgroundColor = '#2CD889';
        document.querySelector('.status-label').style.width = '90px';
    }
    else {
        statusLabel.innerText = 'INACTIVE';
        statusLabel.style.color = 'orange';
        statusLed.style.backgroundColor = 'orange';
        document.querySelector('.status-label').style.width = '100px';
    }
}