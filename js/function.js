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
 var idEmployee = document.getElementById('idEmployee').value;
 var idUser = document.getElementById('idUser').value;
 if(start == "" || end == "" || nbrPeople == "") { 
     this.document.innerHTML = "Erreur.";
 } else {
   var request = new XMLHttpRequest();
   request.onreadystatechange = function() {
     if (request.readyState == 4 && request.status == 200) {
       document.write(request.responseText);
     }
   };
   request.open('POST', 'booking.php');
   request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
request.send(`start=${start}&end=${end}&nbrPeople=${nbrPeople}&idEmployee=${idEmployee}&idUser=${idUser}`);
}
}
