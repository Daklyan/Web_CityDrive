// PAYEMENTS

function verifyTitulaire() {
    var titulaire = document.getElementById("titulaire");

    if( titulaire.value.length > 5 && titulaire.value.length < 50 ) {
        payementElementValid(titulaire);
    }else {
        payementElementError(titulaire);
    }
}

function verifyNumberCard() {
    var number = document.getElementById("number");

    if( number.value.length == 16 && !isNaN(number.value)) {
        payementElementValid(number);
    }else {
        payementElementError(number);
    }
}

function verifyCrypto() {
    var cryptogramme = document.getElementById("cryptogramme");

    if( cryptogramme.value.length == 3 && !isNaN(cryptogramme.value)) {
        payementElementValid(cryptogramme);
    }else {
        payementElementError(cryptogramme);
    }
}

function verifyDateCard() {
    var monthSelect = document.getElementById("month");
    var yearSelect = document.getElementById("year");

    var month = $(monthSelect).children("option:selected").val();
    var year = $(yearSelect).children("option:selected").val();
    var selectedDate = new Date(year, parseInt(month)-1, 31);
    var now = new Date();

    if (selectedDate.getTime() >= now.getTime()) {
        payementElementValid(monthSelect);
        payementElementValid(yearSelect);
    } else {
        payementElementError(monthSelect);
        payementElementError(yearSelect);
    }
}

function payementElementValid(element) {
    element.style.borderColor = "green";
    element.setAttribute("error", "false");
    checkPayementButton();
}

function payementElementError(element) {
    element.style.borderColor = "red";
    element.setAttribute("error", "true");
    checkPayementButton();
}

function checkPayementButton() {
    var titulaire = document.getElementById("titulaire").getAttribute("error");
    var number = document.getElementById("number").getAttribute("error");
    var cryptogramme = document.getElementById("cryptogramme").getAttribute("error");
    var monthSelect = document.getElementById("month").getAttribute("error");
    var yearSelect = document.getElementById("year").getAttribute("error");

    var button = document.getElementById("buttonIpay");


    if (titulaire == "true" || number == "true" || cryptogramme == "true" || monthSelect == "true" || yearSelect == "true") {
        button.setAttribute("disabled","");
    }

    if (titulaire == "false" && number == "false" && cryptogramme == "false" && monthSelect == "false"  && yearSelect == "false") {
        button.removeAttribute("disabled");
    }

}










