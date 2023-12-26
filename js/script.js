// Get the modals
var companyModal = document.getElementById("companyModal");
var humanModal = document.getElementById("humanModal");

// Get the buttons that opens the modals
var companyBtn = document.getElementById("companyBtn");
var humanBtn = document.getElementById("humanBtn");

// Get the <span> element that closes the modals
var spans = document.getElementsByClassName("close");

// When the user clicks on the button, open the modal and fill it with company names
companyBtn.onclick = function() {
	clearTable('company');
    companyModal.style.display = "block";
    getNames('company');
}

// When the user clicks on the button, open the modal and fill it with human names
humanBtn.onclick = function() {
	clearTable('human');
    humanModal.style.display = "block";
    getNames('human');
}

// When the user clicks on <span> (x), close the modal
for (var i = 0; i < spans.length; i++) {
    spans[i].onclick = function() {
        this.parentElement.parentElement.style.display = "none";
    }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == companyModal) {
        companyModal.style.display = "none";
    }
    if (event.target == humanModal) {
        humanModal.style.display = "none";
    }
}

function clearTable(type) {
    var table = document.getElementById(type + 'Table');
    while (table.tBodies.length > 1) {
        table.removeChild(table.tBodies[table.tBodies.length - 1]);
    }
}

function getNames(type) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'src/getNames.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var names = JSON.parse(this.responseText);
            var table = document.getElementById(type + 'Table');
            var tableBody = table.createTBody();
            for(var i = 0; i < names.length; i++) {
                var row = tableBody.insertRow();
                row.insertCell().textContent = i + 1;
                row.insertCell().textContent = names[i];
            }
        }
    };
    xhr.send("type=" + type);
}
