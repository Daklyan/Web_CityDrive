<?php
session_start();
require_once('admin/bddConnect.php');
$idEmployee = $_POST['idEmployee'];
$idUser = $_SESSION['id'];
$start = secure($_POST['start']);
$end = secure($_POST['end']);
$nbrPeople = secure($_POST['nbrPeople']);

function secure($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$check = $bdd->prepare("SELECT available FROM service WHERE available = 1 AND idEmployee = ?");
$check->execute(array($idEmployee));
$available = $check->fetch(PDO::FETCH_ASSOC);

if($available['available'] == 1) // Si le chauffeur est dispo
{?>
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
        <body>
          <div class="py-5 text-center text-white align-items-center d-flex" id="div4">
            <div class="container w-50">
              <div class="row">
                <div class="col-md-12">
                  <div class="card text-primary">
                    <div class="card-header h1">Réservation enregistré sur City Drive.</div>
                    <div class="card-body">
                      <p class="text-dark">Votre réservation a bien été prise en compte retour a l'acceuil. </p>
                      <a href="index.php" class="btn btn-lg btn-primary mx-1">Retour vers l'accueil</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </body>

        </html>
        <?php
        header( "Refresh:5; url=index.php" );
      } else {  ?>
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
    <body>
      <div class="py-5 text-center text-white align-items-center d-flex" id="div4">
        <div class="container w-50">
          <div class="row">
            <div class="col-md-12">
              <div class="card text-primary">
                <div class="card-header h1">Réservation échoué. </div>
                <div class="card-body">
                  <p class="text-dark">La réservation a échoué dommage, vous allez être redirigez vers l'acceuil. </p>
                  <a href="index.php" class="btn btn-lg btn-primary mx-1">Retour vers l'acceuil</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
      <?php header( "Refresh:5; url=index.php" ); } ?>
