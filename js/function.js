function connectUser() {
 var identifiant = document.getElementById('identifiant').value;
 var password = document.getElementById('password').value;
 if(identifiant == "" || password == "") { 
 } else {
   var request = new XMLHttpRequest();
   request.onreadystatechange = function() {
     if (request.readyState == 4 && request.status == 200) {
       document.write(request.responseText);
     }
   };
   request.open('POST', 'connectUser.php');
   request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   request.send(`identifiant=${identifiant}&password=${password}`);
 }
}

function validate() {
    var idUser = document.getElementById('idUser').value;
    var idEmployee = document.getElementById('idEmployee').value;
    var price = document.getElementById('price').value;
    var startPoint = document.getElementById('startPoint').value;
    var endPoint = document.getElementById('endPoint').value;
    var nbrKm = document.getElementById('nbrKm').value;
    var services = document.getElementById('services').value;
    var val = 1;
    if(val == 0 && idUser == "") {
    } else {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                document.write(request.responseText);
            }
        };
        request.open('POST', 'addBooking.php');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(`idUser=${idUser}&idEmployee=${idEmployee}&price=${price}
                     &startPoint=${startPoint}&endPoint=${endPoint}&nbrKm=${nbrKm}&services=${services}`);
    }
}