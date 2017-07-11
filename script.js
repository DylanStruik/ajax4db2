function showCountry(name) {
    var xhttp;
    if (name == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "getCountry.php?mode=list&query=" + name, true);
    xhttp.send();
}

function getCountryData(id) {
    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint2").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "getCountry.php?mode=fullinfo&id=" + id, true);
    xhttp.send();
}
