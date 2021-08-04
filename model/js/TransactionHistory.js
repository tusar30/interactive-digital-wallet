const inputdate = document.getElementById('input_date');
const inputtime = document.getElementById('input_time');

function search() {
    var date = checkinputdate();
    var time = checkinputtime();

    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(this.status === 200) {
            document.getElementById('search-result').innerHTML = this.responseText;
        }
    }

    if(date && time) {
        xhttp.open('GET', "./../controller/TransactionHistory.php?date=" + inputdate.value +"&time=" + inputtime.value);
        xhttp.send();
    }
    else if(date){
        xhttp.open('GET', "./../controller/TransactionHistory.php?date=" + inputdate.value);
        xhttp.send();
    } else if(time) {
        xhttp.open('GET', "./../controller/TransactionHistory.php?time=" + inputtime.value);
        xhttp.send();
    } else {
        document.getElementById('search-result').innerHTML = "<h3>Provide necessary information</h3>"
    }
}

function checkinputtime() {
    if(inputtime.value !=null) {
        return true;
    } return false;
}

function checkinputdate() {
    if(inputdate.value != null) {
        return true;
    } return false;
}