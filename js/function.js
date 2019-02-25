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


function booking() {
 var start = document.getElementById('start').value;
 var end = document.getElementById('end').value;
 var nbrPeople = document.getElementById('nbrPeople').value;
 var service = document.getElementById('service').value;
 var idEmployee = document.getElementById('idEmployee').value;
 var idUser = document.getElementById('idUser').value;
 if(start == "" || end == "" || nbrPeople == "") { 
 } else {
   var request = new XMLHttpRequest();
   request.onreadystatechange = function() {
     if (request.readyState == 4 && request.status == 200) {
       document.write(request.responseText);
     }
   };
   request.open('POST', 'sendBooking.php');
   request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   request.send(`start=${start}&end=${end}&nbrPeople=${nbrPeople}&service=${service}&idEmployee=${idEmployee}&idUser=${idUser}`);
 }
}
