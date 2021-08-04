const category = document.getElementById('selected_category');
const phoneNumber = document.getElementById('input_phone');
const amount = document.getElementById('input_amount');

const catergoryError = document.getElementById('error_inputCategory');
const phoneNumberError = document.getElementById('error_inputPhoneNumber');
const amountError = document.getElementById('error_inputAmount');

function isValid() {
    var inputPhone = checkPhoneNumber();
    var inputAmount = checkAmount();
    var inputCategory = checkCaterogry();
    console.log(inputAmount);
    console.log(inputPhone);
    console.log(inputCategory);
    if(inputPhone && inputCategory &&  inputAmount) {
        var xhttp = new XMLHttpRequest();
        xhttp.onload = function() {    
            if(this.status === 200) {
                
                document.getElementById('result').innerHTML = this.responseText;
            }               
        }
        xhttp.open('POST', "./../controller/TransactionHistory.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("category=" + category.options[category.selectedIndex].value + "&phoneNumber="+ phoneNumber.value + "&amount=" + amount.value);
    }
}


function checkCaterogry() {
    if(category.options[category.selectedIndex].value === 'default') {
        catergoryError.innerHTML = "Select category";
        return false;
    } else {
        catergoryError.innerHTML = '';
        return true;
    }
}

function checkPhoneNumber() {
    console.log(phoneNumber.value);
    if(phoneNumber.value != '') {
        if(validatePhoneNumber(phoneNumber.value)) {
            phoneNumberError.innerHTML = '';
            return true;
        } else {
            phoneNumberError.innerHTML = "valid Phone Number!";
            return false;
        }
    } else {
        phoneNumberError.innerHTML = 'Phone Number!';
        return false;
    }

}

function checkAmount() {

    if(amount.value != '') {
        if(amount.value > 0) {
            amountError.innerHTML = '';
            return true;
        } else{
            amountError.innerHTML = "Must be > 0!";
            return false;
        }
    } else {
        amountError.innerHTML = 'Enter amount!';
        return false;
    }
}

function validatePhoneNumber(phone) {
    var regex1 = /^\+?(88)([0-9]{11})$/
    var regex2 = /^(01)([0-9]{9})$/

    if(regex1.test(phone) || regex2.test(phone)) {
        return true;
    } return false;
}