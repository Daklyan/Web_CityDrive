<?php
  session_start();
    if (!isset($_SESSION['flag'])) {
      require "redirect2.php";
      } else {
        $idEmployee = $_POST['idEmployee'];
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>City Drive</title>
  <meta name="description" content="Booking - Le nouveau Uber !">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="div3">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <div class="collapse navbar-collapse"> <img src="assets/pic/title.png" class="navbar-brand">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link text-primary" href="index.php">Acceuil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <?php
            if (isset($_SESSION['flag'])) {
              ?>
            <li class="nav-item">
              <a class="nav-link text-primary" href="profil.php">Compte</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="disconnect.php">Déconnexion</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link text-primary" href="register.php">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="connection.php">Connexion</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

  </header>
  <div class="container text-center">
    <div class="row">
      <div class="mt-4 col-md-6 flex-column">
        <h3 class="display-4 mb-3">Réserve ta course !</h3>
          <img class="h-75" src="assets/pic/staticmap.png">
      </div>
      <div class="mt-5 p-5 col-md-6">
          <form action="sendBooking.php" method="post">
          <div class="form-group">
              <label>Départ</label><br>
              <small class="text-red" id="err1"></small>
              <input onblur="verif()" id="input1" class="form-control" placeholder="1 rue du carrefour, paris, 75001..." name="start">
          </div>
          <div class="form-group">
              <label>Arrivée</label><br>
              <small class="text-red" id="err2"></small>
              <input onblur="verif()" id="input2" class="form-control" placeholder="2 rue de paris, paris, 75013..." name="end">
          </div>
          <div class="form-group">
              <label>Nombre de personne</label><br>
              <small class="text-red" id="err3"></small>
              <input onblur="verif()" id="input3" class="form-control" placeholder="2..." name="nbrPeople">
          </div>
      </div>
    </div>
  </div>
  <hr>
  <h1 class="display-4 mt-3 text-center">Les services</h1>
  <div class="container">
      <div class="row">
          <div class="p-3 col-md-5 ml-5">
                  <div class="form-group">
                      <label class="form-label">Menu du jour, boisson incluse</label><br>
                      <small>+20€/personne</small>
                      <input name="mdj" class="form-control form-control-sm w-50" type="text" placeholder="combien de menu ?">
                  </div>
                  <div class="form-group">
                      <label class="form-label">Menu gastronomique</label><br>
                      <small>+50€/personne</small>
                      <input name="mg" class="form-control form-control-sm w-50" type="text"  placeholder="combien de menu ?">
                  </div>
                  <div class="form-group">
                      <label class="form-label">Menu au choix parmi un ensemble de restaurant</label><br>
                      <small> prix restaurant + 17€/personne</small>
                      <input name="mr" class="form-control form-control-sm w-50" type="text"  placeholder="combien de menu ?">
                  </div>
                  <hr>
                  <div class="form-group">
                      <label>Location appareils numériques et audioguides</label><br>
                      <small>(Obligatoirement pour 1 jour)</small>
                      <div class="form-check mt-2">
                          <input name="mac1" value="1" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Apple Mac Book Air</label><small> +80€</small>
                      </div>
                      <div class="form-check mt-1">
                          <input name="mac2" value="1" class="form-check-input" type="checkbox" >
                          <label class="form-check-label">Apple Mac Book Pro</label><small> +150€</small>
                      </div>
                      <div class="form-check mt-1">
                          <input name="laptop" value="1" class="form-check-input" type="checkbox">
                          <label class="form-check-label" for="w">Ordinateur portable (Windows)</label><small> +60€</small>
                      </div>
                      <div class="form-check mt-1">
                          <label class="form-check-label" >Tablette android et apple</label><small> +60€</small><br>
                          <input name="android" value="1" type="checkbox"><small> Android</small><br>
                          <input name="ipad" value="1" type="checkbox"><small> Ipad</small><br>
                      </div>
                      <div class="mt-1">
                          <label class="form-check-label">Réservation audio guide</label><br>
                          <small> +8€/personne</small>
                          <input name="audio" class="form-control form-control-sm w-50" type="text"  placeholder="combien ?">
                      </div>
                  </div>
                  <hr>
                  <div class="form-group">
                      <label>Préparation de visites touristiques</label><br>
                      <small>(musées, restaurants, hôtels)</small>
                      <div class="form-check mt-2">
                          <input name="hotel" value="1" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Réservation hôtel</label><small> chambre hôtel + 10€/personne</small>
                      </div>
                      <div class="form-check mt-1">
                          <input name="billet" value="1" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Achats billets touristiques</label><small> prix billet + 10€/personne</small>
                      </div>
                      <div class="form-check mt-1">
                          <input name="restau" value="1" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Réservation restaurant</label><small> +6€/personne</small>
                      </div>
                      <div class="form-check mt-1">
                          <label class="form-check-label">Autre</label>
                          <small class="text-primary"> Nous contactez une fois la réservation compléter</small>
                      </div>
                  </div>
          </div>
          <div class="p-3 col-md-5">
              <div class="form-group">
                  <label>Interprétes et coachs</label><br>
                  <small>(Prix par heure)</small>
                  <div class="form-check mt-2">
                      <input value="1" class="form-check-input" type="checkbox">
                      <label class="form-check-label">Interprète</label><small> +80€</small>
                  </div>
                  <div class="form-check mt-1">
                      <input value="1" class="form-check-input" type="checkbox">
                      <label class="form-check-label">Coach sportif</label><small> +75€</small>
                  </div>
                  <div class="form-check mt-1">
                      <input value="1" class="form-check-input" type="checkbox">
                      <label class="form-check-label">Coach culture</label><small> +120€</small>
                  </div>
                  <div class="form-check mt-1">
                      <label class="form-check-label">Autre</label><small class="text-primary"> Nous contactez une fois la réservation compléter</small>
                  </div>
              </div>
              <hr>
              <div class="form-group">
                  <label>Pets Sittings</label><br>
                  <div class="form-check mt-2">
                      <input value="1" class="form-check-input" type="checkbox">
                      <label class="form-check-label">Transports petit animal</label><small> +35€</small>
                  </div>
                  <div class="form-check mt-1">
                      <input value="1" class="form-check-input" type="checkbox">
                      <label class="form-check-label">Coach sportif</label><small> +75€</small>
                  </div>
                  <div class="form-check mt-1">
                      <input value="1" class="form-check-input" type="checkbox">
                      <label class="form-check-label">Coach culture</label><small> +120€</small>
                  </div>
                  <div class="form-check mt-1">
                      <label class="form-check-label">Autre</label><small class="text-primary"> Nous contactez une fois la réservation compléter</small>
                  </div>
              </div>
                  <input name="idEmployee" type="hidden" value="<?php echo $idEmployee; ?>">
                  <button onmouseover="verif()" id="button" type="submit" class="btn btn-outline-primary m-2" disabled>Payement et résumer</button>
          </form>
          </div>
      </div>
  </div>
  <footer>
    <div class="bg-dark py-3">
      <div class="container">
        <div class="row d-flex justify-content-between">
          <div class="col-lg-4 col-md-6">
            <p class="text-secondary mb-0">© Copyright - City drive 2019</p>
          </div>
          <div class="col-lg-4 col-md-6">
            <p class="text-secondary mb-0">dev team - Cosma, Louis, Kenji</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="js/check.js"></script>
      <script>
          function verif() {
          var input1 = document.getElementById("input1").value;
          var err1 = document.getElementById("err1");
          var input2 = document.getElementById("input2").value;
          var err2 = document.getElementById("err2");
          var input3 = document.getElementById("input3").value;
          var err3 = document.getElementById("err3");
          if(input1 != []){
          valid(input1, err1);
          if(input2 != []) {
          valid(input2, err2);
          if(input3 != []) {
          valid(input3, err3);
      } else {
          document.getElementById('button').disabled = true;
          err3.innerHTML = "Champs incomplet";
      }
      } else {
          document.getElementById('button').disabled = true;
          err2.innerHTML = "Champs incomplet";
      }
      } else {
          document.getElementById('button').disabled = true;
          err1.innerHTML = "Champs incomplet";
      }
      }
          function valid(x,r){
          if (x != "") {
          document.getElementById('button').disabled = false;
          r.innerHTML = "";
      }
      }
      </script>
</body>

</html>
<?php } ?>
